<h3>Добавьте метод andWhere в класс Db, который обеспечит реализацию цепочки: 							<br/>
																			  							<br/>
	echo $db->table('product')->where('name', 'Alex')->where('session', 123)->andWhere('id', 5)->get(); <br/>
																										<br/>
	которая должна вывести SELECT * FROM product WHERE name = Alex AND session = 123 AND id = 5; 			<br/>
</h3>

<?php
class Db
{
    protected $tableName;
    protected $wheres = [];
    protected $andWheres = [];

    public function table($tableName) {

        $this->tableName = $tableName;
        return $this;
    }

    public function where($filed, $value) {
        $this->wheres[] = [
            'field' => $filed,
            'value' => $value
        ];
        return $this;
    }

    public function andWhere($id, $values) {
        $this->andWheres[] = [
            'id' => $id,
            'values' => $values
        ];
        return $this;
    } 

    public function getAll() {
        $sql = "SELECT * FROM {$this->tableName} ";

        if (!empty($this->wheres)) {
            $sql .= " WHERE ";
        }
            foreach ($this->wheres as $value) {
                $sql .= $value['field'] . " = " . $value['value'];
                if ($value != end($this->wheres)) $sql .= " AND ";
            }
            $this->wheres = [];

         return $sql . "<br>";
    }

    public function getOne($id) {
        return "SELECT * FROM {$this->tableName} WHERE id = {$id}" . "<br>";
    }
    

    public function get() {
        $sql = "SELECT * FROM {$this->tableName} WHERE ";

            foreach ($this->wheres as $value) {
                $sql .= $value['field'] . " = " . $value['value'];
                if ($value != end($this->wheres)) $sql .= " AND ";  
            }

            foreach ($this->andWheres as $value) {
                $sql .= " AND " . $value['id'] . "=" . $value['values'];     
            }
            $this->andWheres = [];

         return $sql . "<br>";
    }
}

$db = new Db();
echo $db->table('goods')->where('name', 'чай')->where('price', 12)->getAll();
echo $db->table('users')->where('login', 'admin')->where('pass', 123)->getAll();
echo $db->table('users')->getAll();
echo $db->table('users')->getOne(5);
echo $db->table('product')->where('name', 'Alex')->where('session', 123)->andWhere('id', 5)->get();