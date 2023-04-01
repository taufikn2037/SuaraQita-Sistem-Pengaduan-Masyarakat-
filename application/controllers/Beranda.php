<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_model');
    }

    public function index()
    {

        $headers = [
            "User-Agent: userAgent"
        ];

        // buat request
        // API yang digunakan adalah NewsAPI : https://newsapi.org/
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://newsapi.org/v2/top-headlines?category=general&country=id&apiKey=8642ac8d640f4a3c98046ce6e84b294e");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $data = curl_exec($ch);

        // ubah response
        $data = json_decode($data, true);

        // handle error; error output
        if (curl_getinfo($ch, CURLINFO_HTTP_CODE) !== 200) {

            var_dump($data);
        }

        curl_close($ch);

        $id = htmlspecialchars($this->input->post('id', true));
        $data['data_berita'] = $this->m_model->get_berita();
        $data['data_galeri'] = $this->m_model->get_galeri();
        $this->load->view('v_beranda/beranda', $data);
    }
}
