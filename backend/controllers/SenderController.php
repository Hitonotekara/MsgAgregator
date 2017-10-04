<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 10/2/17
 * Time: 10:03 PM
 */

namespace backend\controllers;

//use backend\config\$senderProstorConfig;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

use yii\data\ActiveDataProvider;

use backend\models\Abonent;
use backend\models\SenderList;
use backend\models\SenderForm;

use backend\serviceprov\ServiceSend;



/**
 * Sender controller
 */
class SenderController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [

                    [
                        /*'actions' => ['index'],*/
                        'allow' => true,
                        'roles' => ['roleSenderWeb'],
                    ],


                ],
            ],
            /*
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'index' => ['get'],
                    'send-msg' => ['post'],
                ],
            ],
            */
        ];
    }

    public static function sendProstor($arrayAbonents, $text)
    {


        #$apiLogin = $senderProstorConfig['apiLogin'];
        #$apiPassword = $senderProstorConfig['apiPassword'];

        $senderProstorConfig = \Senderconfig\PROSTOR;
        $apiLogin = $senderProstorConfig['apiLogin'];
        $apiPassword = $senderProstorConfig['apiPassword'];

        $gate = new ServiceSend($apiLogin, $apiPassword);

        $responseLog = [];

    # var_dump($gate->credits()); // узнаем текущий баланс
        $responseLog['credits'] = $gate->credits();

    # var_dump($gate->senders()); // получаем список доступных подписей
        $responseLog['senders'] = $gate->senders();


        $messages = [];

        foreach ($arrayAbonents as $abn)
        {
            $messages[] = [
                "clientId" => "1",
                "phone"=> $abn,
                "text"=> $text,
            ];
        }

        # var_dump($gate->send($messages, 'testQueue')); //отправляем пакет sms
        $responseLog['send'] = $gate->send($messages, 'testQueue');


/*

 $messages = array(
    array(
        "clientId" => "1",
        "phone"=> "79639953804",
        "text"=> $text,
        "sender"=> ""
    ),
    array(
        "clientId" => "1",
        "phone"=> "79057208983",
        "text"=> $text,
        "sender"=> ""
    ),

);

 */




/* example

$messages = array(
    array("clientId"=>"1","smscId"=>11255142),
    //array("clientId"=>"2","smscId"=>11255143),
    //array("clientId"=>"3","smscId"=>11255144),
    );

    # var_dump($gate->status($messages)); //получаем статусы для пакета sms
        $responseLog['status'] = $gate->status($messages);

            # var_dump($gate->statusQueue('testQueue', 10)); //получаем статусы из очереди 'testQueue'
        $responseLog['statusQueue'] = $gate->statusQueue('testQueue', 10);

*/

        return $responseLog;
        # return 'sendProstor';
    }
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $abonents = Abonent::find()->where(['status' => Abonent::STATUS_ACTIVE])->all(); // orderBy('id')->
        $lists = SenderList::find()->where(['status' => SenderList::STATUS_ACTIVE])->all();
        $errMes = '';
        //$errMes = [];

       ## $errMes = self::sendProstor() !== null ? self::sendProstor() : 'пусто';

       # $errMes = self::sendProstor();

        //$serviceSend = new ServiceSend();
        //$errMes = $serviceSend->Test();


        $model = new SenderForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            //

            $expAbnId = explode(',', $model->abnId);
            #$expLstId = explode(',', $model->lstId);

            $abonentsAQ = Abonent::findAll($expAbnId);
            $arrayAbonents = [];

            foreach ($abonentsAQ as $abn)
            {
                $arrayAbonents[] = $abn->contact;
            }


            $errMes = self::sendProstor($arrayAbonents, $model->text);
            $errMes[] = $arrayAbonents;

            //$errMes = $expAbnId;
            //$errMes = $abonents[0]->contact;

            //$errMes = $arrayAbonents;
            //$errMes = $model->text;

        } else {
            //
        }

        return $this->render('index', [
            'abonents' => $abonents,
            'lists' => $lists,
            'model' => $model,
            'errMes' => $errMes,
        ]);
    }

    /*
    public function actionSendMsg()
    {
        //$entitys = Manager::find()->where(['status' => Manager::STATUS_ACTIVE])->all(); // orderBy('id')->
        //$requestPost = Yii::$app->request->post();

        $model = new SenderForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

        } else {
            //
        }

        return $this->render('send-msg', [
            //'requestPost' => $requestPost,
            'model' => $model,
        ]);
    }
    */

}