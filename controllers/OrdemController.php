<?php

namespace app\controllers;

use Yii;
use app\models\Ordem;
use app\models\OrdemSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * OrdemController implements the CRUD actions for Ordem model.
 */
class OrdemController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'access' => [
                    'class' => AccessControl::class,
                    'only' => ['index', 'view', 'create', 'update', 'delete'],
                    'rules' => [
                        [
                            'allow' => true,
                            'roles' => ['@'], // Apenas usuários logados
                        ],
                    ],
                    'denyCallback' => function ($rule, $action) {
                        Yii::$app->session->setFlash('error', 'Você precisa estar logado para acessar esta página.');
                        return Yii::$app->response->redirect(['site/login']);
                    },
                ],
                'verbs' => [
                    'class' => VerbFilter::class,
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Ordem models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new OrdemSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Ordem model.
     * @param int $idOrdem Id Ordem
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idOrdem)
    {
        return $this->render('view', [
            'model' => $this->findModel($idOrdem),
        ]);
    }

    /**
     * Creates a new Ordem model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Ordem();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idOrdem' => $model->idOrdem]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Ordem model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idOrdem Id Ordem
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idOrdem)
    {
        $model = $this->findModel($idOrdem);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idOrdem' => $model->idOrdem]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Ordem model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idOrdem Id Ordem
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idOrdem)
    {
        $this->findModel($idOrdem)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Ordem model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idOrdem Id Ordem
     * @return Ordem the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idOrdem)
    {
        if (($model = Ordem::findOne(['idOrdem' => $idOrdem])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
