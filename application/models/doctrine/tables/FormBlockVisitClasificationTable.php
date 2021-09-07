<?php

/**
 * FormBlockVisitClasificationTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @method createIfNotExistsOneBy($fieldName, $value = null, array $data = array())
 * @method findOrCreateOneBy($fieldName, $value = null, array $data = array())
 * 
 * @package    ISPC
 * @subpackage Application (2019-05-23)
 * @author     Ancuta <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class FormBlockVisitClasificationTable extends Pms_Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return FormBlockVisitClasificationTable (object)
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('FormBlockVisitClasification');
    }
}