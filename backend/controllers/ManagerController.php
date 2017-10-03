<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 10/2/17
 * Time: 10:03 PM
 */

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

use yii\data\ActiveDataProvider;

use backend\models\Manager;
use backend\models\Abonent;


/**
 * Manager controller
 */
class ManagerController extends Controller
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
                        'roles' => ['roleAdmin'],
                    ],
                    /*
                    [
                        'actions' => ['view-abonents'],
                        'allow' => true,
                        'roles' => ['roleAdmin'],
                    ],
                    */

                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'index' => ['get'],
                ],
            ],
        ];
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
        $entitys = Manager::find()->where(['status' => Manager::STATUS_ACTIVE])->all(); // orderBy('id')->

        return $this->render('index', [
            'entitys' => $entitys,
        ]);
    }

    public function actionViewAbonents()
    {
        #$entitys = Abonent::find()->where(['status' => Abonent::STATUS_ACTIVE])->all();

        $entRequest = Yii::$app->request->get('ent');
        $entinfo = Manager::findOne(['entity' => $entRequest]);

        $viewSet = 'view-abonents';
        #$viewSet = 'view-abonents2';

        $dataProvider = new ActiveDataProvider([
            'query' => Abonent::find()->where(['status' => Abonent::STATUS_ACTIVE]),
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);

        return $this->render($viewSet, [
            #'entitys' => $entitys,
            'entinfo' => $entinfo,
            'dataProvider' => $dataProvider,
        ]);
    }
}