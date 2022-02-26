<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_hitstat extends CI_Model
{
    public static $TABLE_NAME = 'visitor';

    public function get_visitor_count($where = null): int
    {
        $this->db
        ->select('COUNT(*) as total_visitor')
        ->from(static::$TABLE_NAME);

        if (!empty($where))
        {
            $this->db->where($where);
        }

        $result = $this->db->get()->row_array();
        
        return $result['total_visitor'];
    }

    public function get_visitor_hits_count($where = null): int
    {
        $this->db
        ->select('COUNT(hits) as total_hits')
        ->from(static::$TABLE_NAME);

        if (!empty($where))
        {
            $this->db->where($where);
        }

        $result = $this->db->get()->row_array();
        
        return $result['total_hits'];
    }

    public function get_visitor_online_count(): int
    {
        $this->db->where('online >', $this->get_batas_waktu_online());

        return $this->get_visitor_count();
    }

    public function increment_visitor($ip, $date)
    {
        $total_visitor = $this->get_visitor_count(compact('ip', 'date'));
        $waktu = time();
        $waktu_insert = date("Y-m-d H:i:s");

        if ($total_visitor == 0)
        {
            return $this->db->insert(static::$TABLE_NAME, [
                'ip' => $ip,
                'date' => $date,
                'hits' => 1,
                'online' => $waktu,
                'time' => $waktu_insert,
            ]);
        }
        else
        {
            $this->db->where([
                'ip' => $ip,
                'date' => $date,
            ]);

            $this->db->set('hits', 'hits + 1', false);

            return $this->db->update(static::$TABLE_NAME, [
                'online' => $waktu,
            ]);
        }
    }

    public function get_batas_waktu_online(): int
    {
        return time() - 300;
    }
}