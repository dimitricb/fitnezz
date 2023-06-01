<?php

class Program
{
	public $programid;
	public $program_name;
	public $duration;
	public $date;
	public $price;
	public $description;
	public $programtype;
	public $poruka;



	public function __construct($programid, $program_name, $duration, $date, $price, $description, $programtype)
	{
		$this->programid = $programid;
		$this->program_name = $program_name;
		$this->duration = $duration;
		$this->date = $date;
		$this->price = $price;
		$this->description = $description;
		$this->programtype = $programtype;
	}

	public function insertProgram($data, $db)
	{

		if ($data['program_name'] === '' || $data['duration'] === '' || $data['date'] === '' || $data['price'] === '' || $data['description'] === '') {
			$this->poruka = 'Polja moraju biti popunjena';
		} else {

			$save = $db->query("INSERT INTO program(program_name,duration,date,price,description,programtypeid) VALUES ('" . $data['program_name'] . "','" . $data['duration'] . "','" . $data['date'] . "','" . $data['price'] . "','" . $data['description'] . "','" . $data['programtypeid'] . "')") or die($db->error);
			if ($save) {
				$this->poruka = 'Uspesno sacuvan program';
			} else {
				$this->poruka = 'Neuspesno sacuvan program';
			}
		}
	}

	public function getPoruka()
	{
		return $this->poruka;
	}

	public static function vratiSve($db, $uslov)
	{
		$query = "SELECT * FROM program p JOIN programtype pt ON p.programtypeid=pt.programtypeid" . $uslov;
		$query = trim($query);
		$result = $db->query($query) or die($db->error);
		$array = [];
		while ($r = $result->fetch_assoc()) {
			$programtype = new ProgramType($r['programtypeid'], $r['programtypename']);
			$program = new Program($r['programID'], $r['program_name'], $r['duration'], $r['date'], $r['price'], $r['description'], $programtype);
			array_push($array, $program);
		}
		return $array;
	}

	public static function vratiSveOrder($db, $uslov)
	{
		$query = "SELECT * FROM program p JOIN programtype pt ON p.programtypeid=pt.programtypeid ORDER BY program_name ASC" . $uslov;
		$query = trim($query);
		$result = $db->query($query) or die($db->error);
		$array = [];
		while ($r = $result->fetch_assoc()) {
			$programtype = new ProgramType($r['programtypeid'], $r['programtypename']);
			$program = new Program($r['programID'], $r['program_name'], $r['duration'], $r['date'], $r['price'], $r['description'], $programtype);
			array_push($array, $program);
		}
		return $array;
	}
}
