<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('objectToArray'))
{
    function objectToArray( $object )
    {
        if( !is_object( $object ) && !is_array( $object ) )
        {
            return $object;
        }
        if( is_object( $object ) )
        {
            $object = get_object_vars( $object );
        }
        return array_map( 'objectToArray', $object );
    }
}

if ( ! function_exists('nomDate'))
{
    function nomDate( $date )
    {
        $jours = array ('الأحد', 'الإثنين', 'الثلاثاء','الأربعاء','الخميس','الجمعة','السبت');

        // pour afficher le jour d'une date autre que celle d'aujourd'hui
        // $passe = date ('w', mktime (0,0,0,7,6,2007));
        $passe = date ('w', strtotime($date));
        return $jours[$passe];
        
    }
}

?>
