<?php

class ProgramType{
    public $programtypeid;
    public $programtypename;

    public function __construct($programtypeid,$programtypename){
        $this->programtypeid=$programtypeid;
        $this->programtypename=$programtypename;
    }
    
    public static function vratiSve($db){
        $query="SELECT * FROM programtype";
        $result=$db->query($query);
        $array=[];
        while($r = $result->fetch_assoc()){
            $programtype=new ProgramType($r['programtypeid'],$r['programtypename']);
            array_push($array,$programtype);
            }
        return $array;

    }

}

?>