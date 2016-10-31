<?php


class MockMysqli
{

    public $num_rows = 1;

    public function query($sql)
    {

        $sql_parts = explode(' ', $sql);

        switch ($sql_parts[0]) {
            case 'UPDATE':
            case 'DELETE':
                return true;
                break;
            default:
                return $this;
                break;
        }

    }

    public function fetch_assoc()
    {

        return array(
          'id' => 1,
          'name' => 'Carlos',
          'picture' => "http://example.com/img.jpg",
          'address' => "Avenida Corriente 3456"
        );

    }

}