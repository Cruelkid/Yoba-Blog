<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use yii\console\Controller;
use app\models\User;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class HelloController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     */
    public function actionIndex($message = 'hello world')
    {
        echo $message . "\n";
    }

    public function actionTest() {
    	// $user = new User();
    	// $user->name='Tony';
    	// $user->email='blablabla@yoba.net';
    	// $user->password_hash=md5('1');
    	// $user->save();
    	$user = User::findOne(1);
    	// var_dump($user);
    	// $user->email="allou@yoba.net";
    	// $user->save();
    	$user->delete();
    }
}
