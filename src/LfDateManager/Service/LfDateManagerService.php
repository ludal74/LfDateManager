<?php

namespace LfDateManager\Service;


class LfDateManagerService
{

  
	/**
	 * Constructor
	*/
	function __construct( $config )
	{    
		
	}

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
	
}