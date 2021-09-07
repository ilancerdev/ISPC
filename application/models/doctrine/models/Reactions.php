<?php
//ISPC-2657, elena, 25.08.2020 (ELSA: Reaktionen)
// Maria:: Migration CISPC to ISPC 02.09.2020

Doctrine_Manager::getInstance()->bindComponent('Reactions', 'MDAT');

class Reactions extends BaseReactions
{
    public function getSql(){

        $data = $this->getTable()->getExportableFormat();
        $export = new Doctrine_Export();
        $sql = $export->createTableSql($data['tableName'], $data['columns'], $data['options']);
        return ($sql) ;
    }

    public static function getDateKnowledgeOption(){

        return [
            'full',
            'year and month only',
            'year only'
        ];

    }

    public static function getPatientReactionsByType($ipid, $type){
        $drop = Doctrine_Query::create()
            ->select('*')
            ->from('Reactions')
            ->where("ipid=?", $ipid)
            ->andWhere("typ=?", $type )
            ->andWhere("isdelete=0")
            ->orderBy('create_date', 'DESC')
        ;
        //print_r($drop->getSqlQuery());
        $droparray = $drop->fetchArray();
        return $droparray;
    }

    public function deleteReaction(){
        $doctrineOperation = Doctrine_Query::create()
            ->update("Reactions")
            ->set('isdelete',1)
            ->where("id=?", $this->id);
        $doctrineOperation->execute();

    }





}