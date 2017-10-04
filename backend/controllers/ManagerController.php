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
use backend\models\AbonentAdd;


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

        # title
        $getEnt = Yii::$app->request->get('ent');
        $getEnt ? $entinfo = Manager::findOne(['entity' => $getEnt]) : $entinfo = [];

        # change View
        $viewSet = 'view-abonents';
        #$viewSet = 'view-abonents2';

        # main content
        $dataProvider = new ActiveDataProvider([
            'query' => Abonent::find()->where(['status' => Abonent::STATUS_ACTIVE])->orderBy('id'),
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);
        # // main content

        # add abonent
        $model = new AbonentAdd();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            // Yii::$app->request->post('description')
            $objAQ = new Abonent();
            $objAQ->name = $model->name;
            $objAQ->description = $model->description;//Yii::$app->request->post('name');//$model->description;
            $objAQ->contact = $model->contact;
            $objAQ->status = Abonent::STATUS_ACTIVE;
            $objAQ->save();

        } else {
            //
        }
        # // add abonent

        return $this->render($viewSet, [
            #'entitys' => $entitys,
            'entinfo' => $entinfo,
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }

 #   public function actionAddAbonent()

    public function actionDeleteAbonent()
    {
        $getId = Yii::$app->request->get('id');
        $getEnt = Yii::$app->request->get('ent');

        $objAQ = Abonent::findOne($getId);
        $objAQ->delete();
        //$query = $objAQ::findOne()->where('id' = Yii::$app->request->get('id'));
        //$query->
        //return $this->render('', []);
        //$this->forward('manager/view-abonents&ent=' . $getEnt);
        //$this->forward('index.php?r=manager%2Fview-abonents');

        #return $this->render('delete-abonent');
        //return $this->redirect('index.php?r=manager/view-abonents&ent=' . $getEnt);
        return $this->redirect('index.php?r=manager/view-abonents');

    }

    public function actionUpdateAbonent()
    {
        $getId = Yii::$app->request->get('id');

        $objAQ = Abonent::findOne($getId);
        $model = new AbonentAdd();

        # update abonent
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $objAQ->name = $model->name;
            $objAQ->description = $model->description;
            $objAQ->contact = $model->contact;
            //$objAQ->status = Abonent::STATUS_ACTIVE;
            $objAQ->save();

            return $this->redirect('index.php?r=manager/view-abonents');


        } else {
            return $this->render('update-abonent', [
                #entitys' => $entitys,
                'model' => $model,
                'entity' => $objAQ,
            ]);
        }
        # // update abonent



    }

}