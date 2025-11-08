<?php

namespace app\controllers;

use app\models\Application;
use app\models\AdminSearch;
use app\models\CancelApplication;
use app\models\Status;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\VarDumper;

/**
 * AdminController implements the CRUD actions for Application model.
 */
class AdminController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    public function beforeAction($action)
    {
        if (Yii::$app->user->isGuest ||  !Yii::$app->user->identity->isAdmin) {
            return $this->redirect('/');
        }

        if (!parent::beforeAction($action)) {
            return false;
        }

        // other custom code here

        return true; // or false to not run the action
    }

    /**
     * Lists all Application models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new AdminSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Application model.
     * @param int $id № заявки
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


    public function actionCancel($id)
    {
        $model = new CancelApplication();
        $application = $this->findModel($id);

        if ($model->load($this->request->post())) {
            $model->application_id = $id;
            if ($model->save()) {
                $application->status_id = Status::getStatusId('cancel');
                if ($application->save()) {
                    Yii::$app->session->setFlash('warning', 'Завяка отменена.');
                    return $this->redirect(['view', 'id' => $id]);
                } else {
                    Yii::debug($application->errors);
                    $model->delete();
                }
            } else {
                Yii::debug($model->errors);
            }
        }


        return $this->render('cancel', [
            'model' => $model,
            'application' => $application,
        ]);
    }



    /**
     * Updates an existing Application model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id № заявки
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionChangeStatus($id, $status)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost) {
            $model->status_id = Status::getStatusId($status);

            if ($model->save(false)) {
                Yii::$app->session->setFlash('success', 'Статус заявки успешно зменен.');
                return $this->redirect(['index']);
            } else {
                VarDumper::dump($model->errors, 10, true);
                die;
            }
        }
    }


    /**
     * Finds the Application model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id № заявки
     * @return Application the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Application::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
