<?php
define('__MLC_POSTMARK__', dirname(__FILE__));
define('__MLC_POSTMARK_CORE__', __MLC_POSTMARK__ . '/_core');


define('__MLC_POSTMARK_CORE_CTL__', __MLC_POSTMARK_CORE__ . '/ctl');
define('__MLC_POSTMARK_CORE_MODEL__', __MLC_POSTMARK_CORE__ . '/model');
define('__MLC_POSTMARK_CORE_VIEW__', __MLC_POSTMARK_CORE__ . '/view');
define('__MLC__POSTMARK_CG__', __MLC_POSTMARK__ . '/_codegen');
MLCApplicationBase::$arrClassFiles['MLCPostmarkDriver'] = __MLC_POSTMARK_CORE_MODEL__ . '/MLCPostmarkDriver.class.php';

//require_once(__MLC_POSTMARK_CORE__ . '/_enum.inc.php');
