<?php
class Db extends mysqli
{
    private $table, $pk;
    public function __construct($table, $pk = "id")
    {
        parent::__construct('localhost', 'root', '', 'batch7.30a');
        $this->table = $table;
        $this->pk = $pk;
    }
    public function save(array $data, $id = null)
    {
        $sql = "insert into $this->table set ";
        $wh = "";
        if ($id) {
            $sql = "update $this->table set ";
            $wh = " where $this->pk=$id";
        }
        $data = array_map('addslashes', $data);
        foreach ($data as $col => $colval) {
            $sql .= " $col='$colval',";
        }
        $sql = substr($sql, 0, -1) . $wh;

        if ($this->query($sql)) {
            if ($id) {
                return $id;
            }
            return $this->insert_id;
        }
        return null;
    }
    public function find($id, $cols = "*")
    {
        $sql = "select $cols from $this->table where $this->pk=$id";
        return $this->query($sql)->fetch_assoc();
    }

    public function all($cols = "*")
    {
        $sql = "select $cols from $this->table order by $this->pk desc";
        return $this->query($sql)->fetch_all(1);
    }
    public function custom($sql)
    {
        $rs = $this->query($sql);
        if ($rs) {
            // if ($rs->num_rows == 1) {
            //     return $rs->fetch_assoc();
            // }
            return $rs->fetch_all(1);
        }
        return null;
    }
    public function delete($id)
    {
        $sql = "delete from $this->table where $this->pk in($id)";
        return $this->query($sql);
    }
}
