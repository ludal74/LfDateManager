<?php
return array(

	'controller_plugins' => array(
			'invokables' => array(
					'LfDatePlugin' => 'LfDateManager\Plugin\LfDatePlugin'
			)
	),

    
	'view_helpers' => array(
			'invokables' => array(
					'LfDateHelper' => 'LfDateManager\View\Helper\LfDateHelper'
			)
	)
	
);
