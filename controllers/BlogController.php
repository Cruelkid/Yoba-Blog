<?php

namespace app\controllers;

use Yii;
use app\models\Comment;
use app\models\LoginForm;
use app\models\Post;
use app\models\SignupForm;
use yii\db\Expression;
use yii\web\NotFoundHttpException;

class BlogController extends \yii\web\Controller
{
    public function actionIndex() {
        $models=Post::find()->all();
        $post = null;
        if(!Yii::$app->user->isGuest) {
            $post = new Post();
            if($post->load(Yii::$app->request->post())) {
                $post->created_at = new Expression('NOW()');
                $post->user_id = Yii::$app->user->identity->id;
                if($post->save())
                    return $this->redirect(['', ]);
            }
                // $post->created_at = new Expression('NOW()');
                // $post->user_id = Yii::$app->user->identity->id;
                // if($post->save())
                //     return $this->redirect(['', ]);
        }
        return $this->render('index', [
                'models'=>$models,
                'postForm'=>$post,
            ]);
    }

    public function actionLogin() {
        $loginForm = new LoginForm();
        if ($loginForm->load(Yii::$app->request->post()) && $loginForm->login()) {
            return $this->goBack();
        }
        return $this->render('login', ['loginForm' => $loginForm]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionPost($id) {
        $model = Post::findOne(['id'=>$id]);
        if(!$model)
            throw new NotFoundHttpException('Post not found :(');
        $comment = null;
        if(!Yii::$app->user->isGuest) {
            $comment = new Comment();
            if($comment->load(Yii::$app->request->post())) {
                $comment->post_id = $id;
                $comment->created_at = new Expression('NOW()');
                $comment->user_id = Yii::$app->user->identity->id;
                if($comment->save())
                    return $this->redirect(['blog/post', 'id'=>$id]);
            }
        }    
        return $this->render('post', [
            'model' => $model,
            'commentForm' => $comment,
            ]);            
    }

    public function actionSignup() {

        $model = new SignupForm();

        if($model->load(Yii::$app->request->post())) {
            if($user = $model->signup()) {
                if(Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
                'model' => $model,
            ]);

    }

}
