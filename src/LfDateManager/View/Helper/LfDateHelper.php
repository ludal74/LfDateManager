<?php 
namespace LfDateManager\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class LfDateHelper extends AbstractHelper implements ServiceLocatorAwareInterface  
{
    
    
    public function MondayOfWeek( $week, $year )
    {
    	$date = date( 'Y-m-d', strtotime("$year-W$week-1"));
    	return new \DateTime( $date );
    }
    
    public function SundayOfWeek( $week, $year )
    {
    	$date = date( 'Y-m-d', strtotime("$year-W$week-1"));
    	$mondayDateTime = new \DateTime( $date );
    	$sundayDateTime = $mondayDateTime->add( new \DateInterval('P6D'));
    	return $sundayDateTime;
    }
    
    public function isLeapYear( $year )
    {
    	return (cal_days_in_month(CAL_GREGORIAN, 2, $year) === 29) ? true : false;
    }
    
    
    public function addDaysToDate( \DateTime $date, $daysToAdd )
    {
    	if (FALSE === is_int( $daysToAdd )) {
    		trigger_error('setInteger expected Argument 1 to be Integer', E_USER_WARNING);
    	}
    
    
    	$initDate   = $date;
    	$responseDate   = $initDate->add( new \DateInterval('P'.$daysToAdd.'D'));
    	return $responseDate;
    }
    
    public function __invoke()  
    {  
        //$languageService       =  $this->getServiceLocator()->getServiceLocator()->get("LfDateManagerService");
        //$this->languageService = $languageService;
        return $this;
    }  

    /**
     * Set the service locator.
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return CustomHelper
     */
    public function setServiceLocator(ServiceLocatorInterface $serviceLocator)
    {
    	$this->serviceLocator = $serviceLocator;
    	return $this;
    }
    /**
     * Get the service locator.
     *
     * @return \Zend\ServiceManager\ServiceLocatorInterface
     */
    public function getServiceLocator()
    {
    	return $this->serviceLocator;
    }
}
?>