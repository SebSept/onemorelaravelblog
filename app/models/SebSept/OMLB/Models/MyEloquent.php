<?php
/**
 * Extended Eloquent
 * 
 * @licence MIT  http://choosealicense.com/licenses/mit/
 * @author sebastienmonterisi@yahoo.fr
 * @package onemorelaravelblog 
 */

namespace SebSept\OMLB\Models;

/**
 * MyEloquent
 */
class MyEloquent extends \Eloquent{
    
    /**
     * Apply a scope to the model query
     * 
     * @param Closure $scope
     * @return \Illuminate\Database\Eloquent\Builder|static
     */
    public static function applyScope(\Closure $scope)
    {
        return $scope(with(new static)->newQuery());
    }
}
