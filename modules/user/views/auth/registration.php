<?php

use app\modules\user\UserManagementModule;
use yii\bootstrap5\ActiveForm;
use yii\captcha\Captcha;
use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\modules\user\models\forms\RegistrationForm $model
 */

$this->title = UserManagementModule::t('front', 'Registration');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container" id="login-wrapper">
    <div class="row">
        <div class="col-md-8 col-md-offset-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?= $this->title ?></h3>
                </div>
                <div class="panel-body">

                    <?php $form = ActiveForm::begin([
                        'id' => 'user',
                        'layout' => 'horizontal',
                        'validateOnBlur' => false,
                    ]); ?>

                    <?= $form->field($model, 'username')->textInput(['maxlength' => 50, 'autocomplete' => 'off', 'autofocus' => true]) ?>

                    <?= $form->field($model, 'password')->passwordInput(['maxlength' => 255, 'autocomplete' => 'off']) ?>

                    <?= $form->field($model, 'repeat_password')->passwordInput(['maxlength' => 255, 'autocomplete' => 'off']) ?>

                    <?= $form->field($model, 'captcha')->widget(Captcha::className(), [
                        'template' => '<div class="row"><div class="col-sm-3">{image}</div><div class="col-sm-4">{input}</div></div>',
                        'captchaAction' => ['/user-management/auth/captcha']
                    ]) ?>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                            <?= Html::submitButton(
                                '<span class="glyphicon glyphicon-ok"></span> ' . UserManagementModule::t('front', 'Register'),
                                ['class' => 'btn btn-primary']
                            ) ?>
                        </div>
                    </div>

                    <?php ActiveForm::end(); ?>

                </div>
            </div>
        </div>
    </div>
</div>

<?php
$css = <<<CSS
html, body {
	background: #eee;
	-webkit-box-shadow: inset 0 0 100px rgba(0,0,0,.5);
	box-shadow: inset 0 0 100px rgba(0,0,0,.5);
	height: 100%;
	min-height: 100%;
	position: relative;
}
#login-wrapper {
	position: relative;
	top: 30%;
}
#login-wrapper .registration-block {
	margin-top: 15px;
}
CSS;

$this->registerCss($css);
?>
