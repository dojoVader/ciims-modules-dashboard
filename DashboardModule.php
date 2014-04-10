<?php

class DashboardModule extends CWebModule
{
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application
        $this->layoutPath = Yii::getPathOfAlias('dashboard.views.layouts');
        
		// import the module-level models and components
		$this->setImport(array(
			'dashboard.models.*',
			'dashboard.components.*',
			'dashboard.components.ContentListView',
		));

		$asset=Yii::app()->assetManager->publish(YiiBase::getPathOfAlias('application.modules.dashboard.assets.js'), true, -1, YII_DEBUG);
		Yii::app()->setComponents(array(
            'errorHandler' => array(
            	'errorAction'  => 'dashboard/default/error',
        	),
            'messages' => array(
                'class' => 'ext.cii.components.CiiPHPMessageSource',
                'basePath' => Yii::getPathOfAlias('application.modules.dashboard')
            ),
        ));
	}
}
