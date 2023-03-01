<?php
error_reporting(0);

/**
 *
 */
class Home extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('email'));
        $this->load->library(array('email'));
        $this->load->library('email');
    }

    public function index()
    {
        $seo = $this->Home_model->get_row('hv_website_seo', array('hv_seo_id' => 2));
        $company = $this->Home_model->get_row('si_company', array('horizon_id' => 1));
        $data['title'] = $seo['Title'];
        $data['keywords'] = $seo['Keywords'];
        $data['description'] = $seo['Description'];
        $data['home_page_content'] = $seo['home_page_content'];
        $data['slider'] = $company['company_web_slider'];
        
        $data['manufacturer'] = $this->Home_model->get_manufacturer();
        $data['car_bodytype_dropdown'] = $this->Home_model->body_type();
        $data['get_all_cars'] = $this->Home_model->get_all_cars();
        $data['get_model_count'] = $this->Home_model->get_model_count();
        $data['get_make_count'] = $this->Home_model->get_make_count();
        $data['get_all_cars_count'] = $this->Home_model->get_all_cars_count();
        $data['get_all_car_image'] = $this->Home_model->get_all_car_image();
        $data['get_make_count_country'] = $this->Home_model->get_make_count_country();
        // echo '<pre>';print_r($this->db->last_query());die;
        $data['get_search_by_type_list_Count'] = $this->Home_model->get_search_by_type_list_Count();
        
        $data['discounted'] = $this->Home_model->get_discounted();
        $data['clearance'] = $this->Home_model->get_clearance();
        // echo '<pre>';print_r($data['clearance']);die;

        $this->load->view('header', $data);
        $this->load->view('home');
        $this->load->view('footer');
    }

    public function see_all_new_arrival()
    {
        $company = $this->Home_model->get_row('si_company', array('horizon_id' => 1));
        $seo = $this->Home_model->get_row('hv_website_seo', array('hv_seo_id' => 2));
        $data['car_tag'] = 0;
        $data['title'] = $seo['Title'];
        $data['keywords'] = $seo['Keywords'];
        $data['description'] = $seo['Description'];
        $data['slider'] = $company['company_web_slider'];

        $data['manufacturer'] = $this->Home_model->get_manufacturer();
        $data['car_bodytype_dropdown'] = $this->Home_model->body_type();
        $data['get_make_count'] = $this->Home_model->get_make_count();
        $data['get_model_count'] = $this->Home_model->get_model_count();

        $data['get_all_cars_count'] = $this->Home_model->get_all_cars_count();
        $data['get_make_count_country'] = $this->Home_model->get_make_count_country();
        $data['get_search_by_type_list_Count'] = $this->Home_model->get_search_by_type_list_Count();
        $arr['clearance_sale'] = 0;
        $data['get_selected_cars'] = $this->Home_model->filter($arr);
        $data['countrys'] = $this->Home_model->get_hv_port_country();

        $this->load->view('header', $data);
        $this->load->view('search');
        $this->load->view('footer');
    }

    public function see_all_discounted()
    {
        $company = $this->Home_model->get_row('si_company', array('horizon_id' => 1));
        $seo = $this->Home_model->get_row('hv_website_seo', array('hv_seo_id' => 2));
        $data['car_tag'] = 1;
        $data['title'] = $seo['Title'];
        $data['keywords'] = $seo['Keywords'];
        $data['description'] = $seo['Description'];
        $data['slider'] = $company['company_web_slider'];

        $data['get_make_count'] = $this->Home_model->get_make_count();
        $data['get_model_count'] = $this->Home_model->get_model_count();
        $data['manufacturer'] = $this->Home_model->get_manufacturer();
        $data['car_bodytype_dropdown'] = $this->Home_model->body_type();

        $data['get_all_cars_count'] = $this->Home_model->get_all_cars_count();
        $data['get_make_count_country'] = $this->Home_model->get_make_count_country();
        $data['get_search_by_type_list_Count'] = $this->Home_model->get_search_by_type_list_Count();
        $arr['clearance_sale'] = 1;
        $data['get_selected_cars'] = $this->Home_model->filter($arr);
        $data['countrys'] = $this->Home_model->get_hv_port_country();

        $this->load->view('header', $data);
        $this->load->view('search');
        $this->load->view('footer');
    }

    public function see_all_clearance()
    {
        $data['manufacturer'] = $this->Home_model->get_manufacturer();
        $data['car_bodytype_dropdown'] = $this->Home_model->body_type();
        $company = $this->Home_model->get_row('si_company', array('horizon_id' => 1));
        $seo = $this->Home_model->get_row('hv_website_seo', array('hv_seo_id' => 2));
        $data['car_tag'] = 2;
        $data['title'] = $seo['Title'];
        $data['keywords'] = $seo['Keywords'];
        $data['description'] = $seo['Description'];
        $data['slider'] = $company['company_web_slider'];

        $data['get_make_count'] = $this->Home_model->get_make_count();
        $data['get_model_count'] = $this->Home_model->get_model_count();

        $data['get_all_cars_count'] = $this->Home_model->get_all_cars_count();
        $data['get_make_count_country'] = $this->Home_model->get_make_count_country();
        $data['get_search_by_type_list_Count'] = $this->Home_model->get_search_by_type_list_Count();
        $arr['clearance_sale'] = 2;
        $data['get_selected_cars'] = $this->Home_model->filter($arr);
        $data['countrys'] = $this->Home_model->get_hv_port_country();

        $this->load->view('header', $data);
        $this->load->view('search');
        $this->load->view('footer');
    }

    public function under($price1)
    {
        $data['manufacturer'] = $this->Home_model->get_manufacturer();
        $data['car_bodytype_dropdown'] = $this->Home_model->body_type();
        $company = $this->Home_model->get_row('si_company', array('horizon_id' => 1));
        $seo = $this->Home_model->get_row('hv_website_seo', array('hv_seo_id' => 2));
        $data['price_to'] = $price1;
        $data['title'] = $seo['Title'];
        $data['keywords'] = $seo['Keywords'];
        $data['description'] = $seo['Description'];
        $data['slider'] = $company['company_web_slider'];

        $data['get_make_count'] = $this->Home_model->get_make_count();
        $data['get_model_count'] = $this->Home_model->get_model_count();

        $data['get_all_cars_count'] = $this->Home_model->get_all_cars_count();
        $data['get_make_count_country'] = $this->Home_model->get_make_count_country();
        $data['get_search_by_type_list_Count'] = $this->Home_model->get_search_by_type_list_Count();

        // $data['get_selected_cars'] = $this->Home_model->under($price1);
        $arr['price_to'] = $price1;
        $data['get_selected_cars'] = $this->Home_model->filter($arr);
        $data['countrys'] = $this->Home_model->get_hv_port_country();

        $this->load->view('header', $data);
        $this->load->view('search');
        $this->load->view('footer');
    }

    public function by_price($price1, $price2)
    {
        $data['manufacturer'] = $this->Home_model->get_manufacturer();
        $data['car_bodytype_dropdown'] = $this->Home_model->body_type();
        $company = $this->Home_model->get_row('si_company', array('horizon_id' => 1));
        $seo = $this->Home_model->get_row('hv_website_seo', array('hv_seo_id' => 2));
        $data['price_from'] = $price1;
        $data['price_to'] = $price2;
        $data['title'] = $seo['Title'];
        $data['keywords'] = $seo['Keywords'];
        $data['description'] = $seo['Description'];
        $data['slider'] = $company['company_web_slider'];

        $data['get_make_count'] = $this->Home_model->get_make_count();
        $data['get_model_count'] = $this->Home_model->get_model_count();

        $data['get_all_cars_count'] = $this->Home_model->get_all_cars_count();
        $data['get_make_count_country'] = $this->Home_model->get_make_count_country();
        $data['get_search_by_type_list_Count'] = $this->Home_model->get_search_by_type_list_Count();

        $arr['price_from'] = $price1;
        $arr['price_to'] = $price2;
        $data['get_selected_cars'] = $this->Home_model->filter($arr);
        $data['countrys'] = $this->Home_model->get_hv_port_country();

        $this->load->view('header', $data);
        $this->load->view('search');
        $this->load->view('footer');
    }

    public function over($price1)
    {
        $data['manufacturer'] = $this->Home_model->get_manufacturer();
        $data['car_bodytype_dropdown'] = $this->Home_model->body_type();
        $company = $this->Home_model->get_row('si_company', array('horizon_id' => 1));
        // $data['get_selected_cars'] = $this->Home_model->over($price1);
        $seo = $this->Home_model->get_row('hv_website_seo', array('hv_seo_id' => 2));
        $data['price_from'] = $price1;
        $data['title'] = $seo['Title'];
        $data['keywords'] = $seo['Keywords'];
        $data['description'] = $seo['Description'];
        $data['slider'] = $company['company_web_slider'];

        $data['get_make_count'] = $this->Home_model->get_make_count();
        $data['get_model_count'] = $this->Home_model->get_model_count();

        $data['get_all_cars_count'] = $this->Home_model->get_all_cars_count();
        $data['get_make_count_country'] = $this->Home_model->get_make_count_country();
        $data['get_search_by_type_list_Count'] = $this->Home_model->get_search_by_type_list_Count();
        $arr['price_from'] = $price1;
        $data['get_selected_cars'] = $this->Home_model->filter($arr);
        $data['countrys'] = $this->Home_model->get_hv_port_country();

        $this->load->view('header', $data);
        $this->load->view('search');
        $this->load->view('footer');
    }

    public function by_category($value)
    {
        $data['manufacturer'] = $this->Home_model->get_manufacturer();
        $data['car_bodytype_dropdown'] = $this->Home_model->body_type();
        $company = $this->Home_model->get_row('si_company', array('horizon_id' => 1));

        $data['get_active_by_category_cars'] = $this->Home_model->get_active_by_category_cars($value);
        $seo = $this->Home_model->get_row('hv_website_seo', array('hv_seo_id' => 2));
        $data['title'] = $data['get_active_by_category_cars']['Title'];
        $data['keywords'] = $data['get_active_by_category_cars']['Keywords'];
        $data['description'] = $data['get_active_by_category_cars']['Description'];
        $data['car_manufacturer_content'] = $data['get_active_by_category_cars']['car_manufacturer_content'];

        $data['get_make_count'] = $this->Home_model->get_make_count();
        $data['get_model_count'] = $this->Home_model->get_model_count();

        $data['get_all_cars_count'] = $this->Home_model->get_all_cars_count();
        $data['get_make_count_country'] = $this->Home_model->get_make_count_country();
        $data['get_search_by_type_list_Count'] = $this->Home_model->get_search_by_type_list_Count();

        if ($data['get_active_by_category_cars'] == true) {
            $data['make_id'] = $data['get_active_by_category_cars']['vm_id'];
            $arr['make_id'] = $data['make_id'];
            $data['get_selected_cars'] = $this->Home_model->filter($arr);
            $data['countrys'] = $this->Home_model->get_hv_port_country();
            $this->load->view('header', $data);
            $this->load->view('search');
            $this->load->view('footer');
        } else {
            $this->load->view('header', $data);
            $this->load->view('page_not_found');
            $this->load->view('footer');
        }
    }

    public function get_search_by_type($value)
    {
        $data['manufacturer'] = $this->Home_model->get_manufacturer();
        $data['car_bodytype_dropdown'] = $this->Home_model->body_type();
        $company = $this->Home_model->get_row('si_company', array('horizon_id' => 1));

        $data['get_active_by_bodytype_cars'] = $this->Home_model->get_active_by_bodytype_cars($value);

        $seo = $this->Home_model->get_row('hv_website_seo', array('hv_seo_id' => 2));
        $data['title'] = $data['get_active_by_bodytype_cars']['Title'];
        $data['keywords'] = $data['get_active_by_bodytype_cars']['Keywords'];
        $data['description'] = $data['get_active_by_bodytype_cars']['Description'];
        $data['car_bodytype_content'] = $data['get_active_by_bodytype_cars']['car_bodytype_content'];

        $data['get_make_count'] = $this->Home_model->get_make_count();
        $data['get_model_count'] = $this->Home_model->get_model_count();
        $data['get_all_cars_count'] = $this->Home_model->get_all_cars_count();
        $data['get_make_count_country'] = $this->Home_model->get_make_count_country();
        $data['get_search_by_type_list_Count'] = $this->Home_model->get_search_by_type_list_Count();


        if ($data['get_active_by_bodytype_cars'] == true) {
            $data['body_type'] = $data['get_active_by_bodytype_cars']['bodytype_id'];
            // echo "<pre>";print_r($data['body_type']);die;
            $arr['body_type'] = $data['body_type'];
            $data['get_selected_cars'] = $this->Home_model->filter($arr);
            $data['countrys'] = $this->Home_model->get_hv_port_country();
            // $data['get_selected_cars'] = $this->Home_model->get_by_bodytype_cars($data['get_active_by_bodytype_cars']['bodytype_id']);
            $this->load->view('header', $data);
            $this->load->view('search');
            $this->load->view('footer');
        } else {
            $this->load->view('header', $data);
            $this->load->view('page_not_found');
            $this->load->view('footer');
        }
    }

    public function by_model($value)
    {
        $data['manufacturer'] = $this->Home_model->get_manufacturer();
        $data['car_bodytype_dropdown'] = $this->Home_model->body_type();
        $company = $this->Home_model->get_row('si_company', array('horizon_id' => 1));

        $data['get_active_by_model_cars'] = $this->Home_model->get_active_by_model_cars($value);
        $seo = $this->Home_model->get_row('hv_website_seo', array('hv_seo_id' => 2));
        $data['title'] = $data['get_active_by_model_cars']['Title'];
        $data['keywords'] = $data['get_active_by_model_cars']['Keywords'];
        $data['description'] = $data['get_active_by_model_cars']['Description'];
        $data['car_models_content'] = $data['get_active_by_model_cars']['car_models_content'];

        $data['get_model_count'] = $this->Home_model->get_model_count();

        $data['get_make_count'] = $this->Home_model->get_make_count();
        $data['get_all_cars_count'] = $this->Home_model->get_all_cars_count();
        $data['get_make_count_country'] = $this->Home_model->get_make_count_country();
        $data['get_search_by_type_list_Count'] = $this->Home_model->get_search_by_type_list_Count();

        if ($data['get_active_by_model_cars'] == true) {
            $data['module'] = $data['get_active_by_model_cars']['m_id'];
            $data['make_id'] = $data['get_active_by_model_cars']['vm_id'];
            $arr['module'] = $data['module'];
            $data['get_selected_cars'] = $this->Home_model->filter($arr);
            $data['countrys'] = $this->Home_model->get_hv_port_country();
            // $data['get_selected_cars'] = $this->Home_model->get_by_model_cars($data['get_active_by_model_cars']['m_id']);
            $this->load->view('header', $data);
            $this->load->view('search');
            $this->load->view('footer');
        } else {
            $this->load->view('header', $data);
            
            $this->load->view('page_not_found');
            $this->load->view('footer');
        }
    }

    public function country_car($name)
    {
        $name = str_replace('%20', ' ', $name);
        $data['country'] = $this->Home_model->get_active_country($name);
        $data['title'] = $data['country']['Title'];
        $data['keywords'] = $data['country']['Keywords'];
        $data['description'] = $data['country']['Description'];
        $data['url_country_name'] = $data['country']['country_name'];
        $data['url_countries_description'] = $data['country']['countries_description'];
        
        $data['manufacturer'] = $this->Home_model->get_manufacturer();
        $data['car_bodytype_dropdown'] = $this->Home_model->body_type();
        $data['get_make_count'] = $this->Home_model->get_make_count();
        $data['get_model_count'] = $this->Home_model->get_model_count();
        
        $data['get_all_cars_count'] = $this->Home_model->get_all_cars_count();
        $data['get_make_count_country'] = $this->Home_model->get_make_count_country();
        $data['get_search_by_type_list_Count'] = $this->Home_model->get_search_by_type_list_Count();
        
        
        if ($data['country'] == true) {
            $arr['country_id'] = $data['country']['country_id'];
            $data['get_selected_cars'] = $this->Home_model->filter($arr);
            $data['countrys'] = $this->Home_model->get_hv_port_country();
            $this->load->view('header', $data);
            $this->load->view('search_temp');
            $this->load->view('footer');
        } else {
            $this->load->view('header', $data);
            $this->load->view('page_not_found');

            $this->load->view('footer');
        }
    }

    public function car_detail($id)
    {
        $data['manufacturer'] = $this->Home_model->get_manufacturer();
        $data['car_bodytype_dropdown'] = $this->Home_model->body_type();
        $data['get_car_detail'] = $this->Home_model->get_car_detail($id);
        $data['countrys'] = $this->Home_model->get_hv_port_country();
        $car_images = $this->Home_model->get_images($id);
        $data['car_images'] = $car_images;
        $data['car_images_thumb'] = array_chunk($car_images, 6, true);
        $data['inquiry'] = $this->Home_model->select_where('hv_car_inquiry', array('car_d_id' => $id));
        $data['make'] = $this->Home_model->get_row('hv_car_manufacturer', array('vm_id' => $data['get_car_detail']['vm_id']));
        $data['model'] = $this->Home_model->get_row('hv_car_models', array('m_id' => $data['get_car_detail']['m_id']));
        $data['title'] = $data['get_car_detail']['Title'];
        $data['keywords'] = $data['get_car_detail']['Keywords'];
        $data['description'] = $data['get_car_detail']['Description'];
        $data['get_make_count'] = $this->Home_model->get_make_count();
        $data['get_model_count'] = $this->Home_model->get_model_count();
        $data['get_all_cars_count'] = $this->Home_model->get_all_cars_count();
        $data['get_make_count_country'] = $this->Home_model->get_make_count_country();
        $data['get_search_by_type_list_Count'] = $this->Home_model->get_search_by_type_list_Count();
        $data['getSameCarModels'] = $this->Home_model->getSameCarModels($id,$data['get_car_detail']['m_id']);
        // echo '<pre>';print_r($data['make']['vm_name']);die;
        
        $this->load->view('header', $data);
        $this->load->view('car_detail');
        $this->load->view('footer');
    }
    public function car_detail_temp($id)
    {
        $data['manufacturer'] = $this->Home_model->get_manufacturer();
        $data['car_bodytype_dropdown'] = $this->Home_model->body_type();
        $data['get_car_detail'] = $this->Home_model->get_car_detail($id);
        $data['countrys'] = $this->Home_model->get_hv_port_country();
        $car_images = $this->Home_model->get_images($id);
        $data['car_images'] = $car_images;
        $data['car_images_thumb'] = array_chunk($car_images, 6, true);
        $data['inquiry'] = $this->Home_model->select_where('hv_car_inquiry', array('car_d_id' => $id));
        $data['make'] = $this->Home_model->get_row('hv_car_manufacturer', array('vm_id' => $data['get_car_detail']['vm_id']));
        $data['model'] = $this->Home_model->get_row('hv_car_models', array('m_id' => $data['get_car_detail']['m_id']));
        $data['title'] = $data['get_car_detail']['Title'];
        $data['keywords'] = $data['get_car_detail']['Keywords'];
        $data['description'] = $data['get_car_detail']['Description'];
        $data['get_make_count'] = $this->Home_model->get_make_count();
        $data['get_model_count'] = $this->Home_model->get_model_count();
        $data['get_all_cars_count'] = $this->Home_model->get_all_cars_count();
        $data['get_make_count_country'] = $this->Home_model->get_make_count_country();
        $data['get_search_by_type_list_Count'] = $this->Home_model->get_search_by_type_list_Count();
        $data['getSameCarModels'] = $this->Home_model->getSameCarModels($id,$data['get_car_detail']['m_id']);
        $data['getDiffCarModels'] = $this->Home_model->getDiffCarModels($id,$data['get_car_detail']['m_id'],$data['get_car_detail']['vm_id']);
        // echo '<pre>';print_r($data['make']['vm_name']);die;
        
        $this->load->view('header', $data);
        $this->load->view('car_detail_temp');
        $this->load->view('footer');
    }
    public function car_detail_temp2($id)
    {
        $data['manufacturer'] = $this->Home_model->get_manufacturer();
        $data['car_bodytype_dropdown'] = $this->Home_model->body_type();
        $data['get_car_detail'] = $this->Home_model->get_car_detail($id);
        $data['countrys'] = $this->Home_model->get_hv_port_country();
        $car_images = $this->Home_model->get_images($id);
        $data['car_images'] = $car_images;
        $data['car_images_thumb'] = array_chunk($car_images, 6, true);
        $data['inquiry'] = $this->Home_model->select_where('hv_car_inquiry', array('car_d_id' => $id));
        $data['make'] = $this->Home_model->get_row('hv_car_manufacturer', array('vm_id' => $data['get_car_detail']['vm_id']));
        $data['model'] = $this->Home_model->get_row('hv_car_models', array('m_id' => $data['get_car_detail']['m_id']));
        $data['title'] = $data['get_car_detail']['Title'];
        $data['keywords'] = $data['get_car_detail']['Keywords'];
        $data['description'] = $data['get_car_detail']['Description'];
        $data['get_make_count'] = $this->Home_model->get_make_count();
        $data['get_model_count'] = $this->Home_model->get_model_count();
        $data['get_all_cars_count'] = $this->Home_model->get_all_cars_count();
        $data['get_make_count_country'] = $this->Home_model->get_make_count_country();
        $data['get_search_by_type_list_Count'] = $this->Home_model->get_search_by_type_list_Count();
        $data['getSameCarModels'] = $this->Home_model->getSameCarModels($id,$data['get_car_detail']['m_id']);
        $data['getDiffCarModels'] = $this->Home_model->getDiffCarModels($id,$data['get_car_detail']['m_id'],$data['get_car_detail']['vm_id']);
        // echo '<pre>';print_r($data['make']['vm_name']);die;
        
        $this->load->view('header', $data);
        $this->load->view('car_detail_temp2');
        $this->load->view('footer');
    }

    public function country_car_temp($name)
    {
        $name = str_replace('%20', ' ', $name);
        $data['country'] = $this->Home_model->get_active_country($name);
        // echo '<pre>';print_r($data['country']);die;
        $data['title'] = $data['country']['Title'];
        $data['keywords'] = $data['country']['Keywords'];
        $data['description'] = $data['country']['Description'];
        $data['url_country_name'] = $data['country']['country_name'];
        $data['url_countries_description'] = $data['country']['countries_description'];
        
        $data['manufacturer'] = $this->Home_model->get_manufacturer();
        $data['car_bodytype_dropdown'] = $this->Home_model->body_type();
        $data['get_make_count'] = $this->Home_model->get_make_count();
        $data['get_model_count'] = $this->Home_model->get_model_count();
        
        $data['get_all_cars_count'] = $this->Home_model->get_all_cars_count();
        $data['get_make_count_country'] = $this->Home_model->get_make_count_country();
        $data['get_search_by_type_list_Count'] = $this->Home_model->get_search_by_type_list_Count();
        
        
        if ($data['country'] == true) {
            $arr['country_id'] = $data['country']['country_id'];
            $data['get_selected_cars'] = $this->Home_model->filter($arr);

            $this->load->view('header', $data);
            $this->load->view('search_temp', $data);
            $this->load->view('footer');
        } else {
            $this->load->view('header', $data);
            $this->load->view('page_not_found');
            $this->load->view('footer');
        }
    }

    public function get_models_by_make($id)
    {
        $module = $this->db->join('hv_car_models', 'hv_car_models.m_id = hv_car_details.m_id', 'left')
            ->select('hv_car_models.*')
            ->where('hv_car_models.active', 1)
            ->where('hv_car_models.vm_id', $id)
            ->where('hv_car_details.is_trash', 0)
            ->group_by('hv_car_details.m_id')
            ->get('hv_car_details')
            ->result_array();
        echo json_encode($module);
    }
    public function get_port_by_country($id)
    {
        header('Access-Control-Allow-Origin: *');
        $module = $this->Home_model->select_where('hv_port_country_details', array('hv_port_country_id' => $id));
        echo json_encode($module);
    }

    public function test()
    {
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'info@asiahilux.com',
            'smtp_pass' => 'hWAX&8=3ui0XtL',
            'mailtype'  => 'html',
            'charset'   => 'utf-8'
        );
        // $config = Array(
        //     'protocol' => 'smtp',
        //     'smtp_host' => 'asiahilux.com',
        //     'smtp_port' => 465,
        //     'smtp_user' => 'no-reply@asiahilux.com',
        //     'smtp_pass' => 'QWqw12!@',
        //     'mailtype'  => 'html', 
        //     'charset'   => 'iso-8859-1'
        // );
        // echo "<pre>";print_r($config);die;
        $this->email->initialize($config);
        $this->email->set_mailtype("html");
        $this->email->set_newline("\r\n");

        $this->email->from('info@asiahilux.com', 'AsiaHilux');
        $this->email->to('abdulahad92.pro@gmail.com');

        $this->email->subject('Email Test');
        $this->email->message('<h1>Testing the email class.</h1>');

        $this->email->send();
        echo $this->email->print_debugger();
    }

    function send()
    {
        // Load PHPMailer library
        $this->load->library('phpmailer_lib');
        $mail = $this->phpmailer_lib->load();
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'emails.asiahilux.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'info@emails.asiahilux.com';
        $mail->Password = '6Krt_8~mZ*9g';
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;

        $mail->setFrom('info@emails.asiahilux.com', 'Asia Hilux');
        $mail->addReplyTo('info@asiahilux.com', 'Asia Hilux');
        $mail->addAddress('hamad223.hk@gmail.com');
        $mail->Subject = 'Send Email via SMTP using PHPMailer in CodeIgniter';
        $mail->isHTML(true);
        $mailContent = "<h1>Send HTML Email using SMTP in CodeIgniter</h1>
            <p>This is a test email sending using SMTP mail server with PHPMailer.</p>";
        $mail->Body = $mailContent;

        // Send email
        if (!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message has been sent';
        }
    }

    public function send_inq()
    {
        $recapcha_result = $this->CheckCaptcha($_POST['g-recaptcha-response']);
        $redirect = $this->input->post('redirect');
        if ($recapcha_result['success']) {
            $data = array(
                'car_d_id' => $this->input->post('car_d_id'),
                'inquiry_name' => $this->input->post('name'),
                'inquiry_country' => $this->input->post('country_name'),
                'inquiry_city' => $this->input->post('portName'),
                'inquiry_port' => $this->input->post('portName'),
                'inquiry_email' => $this->input->post('email'),
                'inquiry_phone' => $this->input->post('phone'),
                'inquiry_address' => $this->input->post('address'),
                'inquiry_date' => date('Y-m-d'),
                'car_name' => $this->input->post('car_name'),
                'carprice' => $this->input->post('carprice'),
                'port_price' => $this->input->post('port_price'),
                'country_name' => $this->input->post('country_name'),
                'created_at' => date('Y-m-d h:i:s')
            );
            $id = $this->Home_model->insert('hv_car_inquiry', $data);

            if (!empty($id)) {
                $car = $this->Home_model->get_row('hv_car_details', array('car_d_id' => $this->input->post('car_d_id')));

                $car_name = $car['car_d_id'] . '/' . $car['carname'];
                $remove_dot = str_replace('.', '-', $car_name);
                $remove_space = str_replace(' ', '-', $remove_dot);
                $all_small = strtolower($remove_space);
                $url =  base_url('car-detail/' . $all_small);
                $name = $this->input->post('name');

                $message ='<html>
                    <body>
                        <h1>Inquiry Form - Asia Hilux</h1>
                    </body>
                    </html>
                    <html>
                    <body>
                        <table rules="all" style="border-color: #666;" cellpadding="10">
                            <tr style="background: #eee;">
                                <td><strong>Name</strong> </td>
                                <td>' . strip_tags($name) . '</td>
                            </tr>
                            <tr>
                                <td><strong>Email:</strong> </td>
                                <td>' . strip_tags($_POST['email']) . '</td>
                            </tr>
                            <tr>
                                <td><strong>Phone:</strong> </td>
                                <td>' . strip_tags($_POST['phone']) . '</td>
                            </tr>
                            <tr>
                                <td><strong>Stock Id:</strong> </td>
                                <td>' . strip_tags($car['VehicleNo']) . '</td>
                            </tr>
                            <tr>
                                <td><strong>Car Price:</strong> </td>
                                <td>' . strip_tags($_POST['carprice']) . '</td>
                            </tr>
                            <tr>
                                <td><strong>Car Name:</strong> </td>
                                <td><a href='.$url.'>' . strip_tags($car['carname']) . '</a></td>
                            </tr>
                            <tr>
                                <td><strong>Country:</strong> </td>
                                <td>' . strip_tags($_POST['country_name']) . '</td>
                            </tr>
                        </table>
                    </body>
                    </html>';

                // Load PHPMailer library
                $this->load->library('phpmailer_lib');

                // PHPMailer object
                $mail = $this->phpmailer_lib->load();
                // SMTP configuration
                $mail->isSMTP();
                $mail->Host     = 'emails.asiahilux.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'info@emails.asiahilux.com';
                $mail->Password = '6Krt_8~mZ*9g';
                $mail->SMTPSecure = 'ssl';
                $mail->Port     = 465;

                $mail->setFrom('info@emails.asiahilux.com', 'Asia Hilux');
                $mail->addReplyTo('info@asiahilux.com', 'Asia Hilux');
                $mail->addAddress('ansubrazafatmi@gmail.com');
                $mail->addAddress('nakhtar9383@gmail.com');
                $mail->Subject = 'Inquiry Form - Asia Hilux';
                $mail->isHTML(true);
                $mail->Body = $message;
                $mail->send();

                // Remove previous recipients
                $mail->ClearAllRecipients();

                $to2 = $this->input->post('email');

                $message2 = '<html><body>';
                $message2 .= '<h1>Inquiry Form submitted - Asia Hilux)</h1>';
                $message2 .= '</body></html>';
                $message2 = '<html><body>';
                $message2 .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
                $message2 .= "<tr><td><strong>Car Name:</strong> </td><td>" . strip_tags($_POST['car_name']) . "</td></tr>";
                $message2 .= "<tr style='background: #eee;'><td><strong>Thank You</strong> </td><td>We will contact you shortly</td></tr>";
                $message2 .= "</table>";
                $message2 .= "</body></html>";

                $mail->setFrom('info@emails.asiahilux.com', 'Asia Hilux');
                $mail->addReplyTo('info@asiahilux.com', 'Asia Hilux');
                $mail->addAddress($to2);
                $mail->Subject = 'Inquiry Form - Asia Hilux';
                $mail->isHTML(true);
                // $mailContent = $message;
                $mail->Body = $message2;
                $mail->send();
                $this->session->set_flashdata('success', 'Inquiry Added Successfully!');
            }
        } else {
            $this->session->set_flashdata('error', 'Incorrect/Invalid Capcha!');
        }
        echo true;
        // redirect(base_url($redirect));
    }

    function CheckCaptcha($userResponse)
    {
        $fields_string = '';
        $fields = array(
            'secret' => '6Lct0lAdAAAAALVWKxDx4myEsfxWfX7unO-TeFeY',
            'response' => $userResponse
        );
        foreach ($fields as $key => $value) {
            $fields_string .= $key . '=' . $value . '&';
        }
        $fields_string = rtrim($fields_string, '&');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
        curl_setopt($ch, CURLOPT_POST, count($fields));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);

        $res = curl_exec($ch);
        curl_close($ch);

        return json_decode($res, true);
    }

    public function send_quick_inq()
    {
        $car_name = $this->Home_model->get_row('hv_car_details', array('car_d_id' => $this->input->post('get_car_id')));

        $data = array(
            'car_d_id' => $this->input->post('get_car_id'),
            'inquiry_name' => $this->input->post('name'),
            'inquiry_email' => $this->input->post('email'),
            'inquiry_phone' => $this->input->post('phone'),
            'inquiry_address' => $this->input->post('address'),
            'portName' => $this->input->post('portName'),
            'port_price' => $this->input->post('port_price'),
            'country_name' => $this->input->post('country'),
            'inquiry_date' => date('Y-m-d'),
            'car_name' => $car_name['carname'],
            'created_at' => date('Y-m-d h:i:s')
        );
        $id = $this->Home_model->insert('hv_car_inquiry', $data);

        $car = $this->Home_model->get_row('hv_car_details', array('car_d_id' => $this->input->post('get_car_id')));

        $car_name = $car['car_d_id'] . '/' . $car['carname'];
        $remove_dot = str_replace('.', '-', $car_name);
        $remove_space = str_replace(' ', '-', $remove_dot);
        $all_small = strtolower($remove_space);
        $url =  base_url('car-detail/' . $all_small);
        $name = $this->input->post('name');
        
        $message ='<html>
                    <body>
                        <h1>Inquiry Form - Asia Hilux</h1>
                    </body>
                    </html>
                    <html>
                    <body>
                        <table rules="all" style="border-color: #666;" cellpadding="10">
                            <tr style="background: #eee;">
                                <td><strong>Name</strong> </td>
                                <td>' . strip_tags($name) . '</td>
                            </tr>
                            <tr>
                                <td><strong>Email:</strong> </td>
                                <td>' . strip_tags($_POST['email']) . '</td>
                            </tr>
                            <tr>
                                <td><strong>Phone:</strong> </td>
                                <td>' . strip_tags($_POST['phone']) . '</td>
                            </tr>
                            <tr>
                                <td><strong>Stock Id:</strong> </td>
                                <td>' . strip_tags($car['VehicleNo']) . '</td>
                            </tr>
                            <tr>
                                <td><strong>Car Price:</strong> </td>
                                <td>' . strip_tags($_POST['car_price']) . '</td>
                            </tr>
                            <tr>
                                <td><strong>Car Name:</strong> </td>
                                <td><a href='.$url.'>' . strip_tags($car['carname']) . '</a></td>
                            </tr>
                            <tr>
                                <td><strong>Country:</strong> </td>
                                <td>' . strip_tags($_POST['country']) . '</td>
                            </tr>
                        </table>
                    </body>
                    </html>';

        // Load PHPMailer library
        $this->load->library('phpmailer_lib');

        // PHPMailer object
        $mail = $this->phpmailer_lib->load();
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'emails.asiahilux.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'info@emails.asiahilux.com';
        $mail->Password = '6Krt_8~mZ*9g';
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;

        $mail->setFrom('info@emails.asiahilux.com', 'Asia Hilux');
        $mail->addReplyTo('info@asiahilux.com', 'Asia Hilux');
        $mail->addAddress('ansubrazafatmi@gmail.com');
        $mail->addAddress('nakhtar9383@gmail.com');
        $mail->Subject = 'Inquiry Form - Asia Hilux';
        $mail->isHTML(true);
        $mail->Body = $message;
        $mail->send();

        $to2 = $this->input->post('email');

        $message2 = '<html><body>';
        $message2 .= '<h1>Quick Inquiry Form submitted - Asia Hilux)</h1>';
        $message2 .= '</body></html>';
        $message2 = '<html><body>';
        $message2 .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
        $message2 .= "<tr><td><strong>Car Name:</strong> </td><td>" . strip_tags($car['carname']) . "</td></tr>";
        $message2 .= "<tr style='background: #eee;'><td><strong>Thank You</strong> </td><td>We will contact you shortly.</td></tr>";
        $message2 .= "</table>";
        $message2 .= "</body></html>";

        // Remove previous recipients
        $mail->ClearAllRecipients();

        $mail->setFrom('info@emails.asiahilux.com', 'Asia Hilux');
        $mail->addReplyTo('info@asiahilux.com', 'Asia Hilux');
        $mail->addAddress($to2);
        $mail->Subject = 'Inquiry Form - Asia Hilux';
        $mail->isHTML(true);
        $mail->Body = $message2;
        $mail->send();
        echo json_encode(1);
    }

    public function about_us()
    {
        $data['manufacturer'] = $this->Home_model->get_manufacturer();
        $data['car_bodytype_dropdown'] = $this->Home_model->body_type();
        $data['content'] = $this->Home_model->get_row('hv_car_dynamicpages', array('dp_id' => 3));
        
        $seo = $this->Home_model->get_row('hv_website_seo', array('hv_seo_id' => 2));
        $company = $this->Home_model->get_row('si_company', array('horizon_id' => 1));
        $data['title'] = "About US";
        $data['keywords'] = $seo['Keywords'];
        $data['description'] = $seo['Description'];
        $data['slider'] = $company['company_web_slider'];
        $data['get_search_by_type_list_Count'] = $this->Home_model->get_search_by_type_list_Count();
        $data['get_all_cars_count'] = $this->Home_model->get_all_cars_count();

        $this->load->view('header', $data);
        $this->load->view('about_us');
        $this->load->view('footer');
    }
    public function how_to_buy()
    {
        $data['manufacturer'] = $this->Home_model->get_manufacturer();
        $data['car_bodytype_dropdown'] = $this->Home_model->body_type();
        $seo = $this->Home_model->get_row('hv_website_seo', array('hv_seo_id' => 2));
        $company = $this->Home_model->get_row('si_company', array('horizon_id' => 1));
        $data['content'] = $this->Home_model->get_row('hv_car_dynamicpages', array('dp_id' => 3));

        $data['title'] = "How To Buy";
        $data['keywords'] = $seo['Keywords'];
        $data['description'] = $seo['Description'];
        $data['slider'] = $company['company_web_slider'];

        $data['get_all_cars_count'] = $this->Home_model->get_all_cars_count();
        $data['get_search_by_type_list_Count'] = $this->Home_model->get_search_by_type_list_Count();

        $this->load->view('header', $data);
        $this->load->view('how_to_buy');
        $this->load->view('footer');
    }
    public function bank_details()
    {
        $data['manufacturer'] = $this->Home_model->get_manufacturer();
        $data['car_bodytype_dropdown'] = $this->Home_model->body_type();
        $seo = $this->Home_model->get_row('hv_website_seo', array('hv_seo_id' => 2));
        $company = $this->Home_model->get_row('si_company', array('horizon_id' => 1));
        $data['content'] = $this->Home_model->get_row('hv_car_dynamicpages', array('dp_id' => 3));

        $data['title'] = "Bank Details";
        $data['keywords'] = $seo['Keywords'];
        $data['description'] = $seo['Description'];
        $data['slider'] = $company['company_web_slider'];

        $data['get_all_cars_count'] = $this->Home_model->get_all_cars_count();
        $data['get_search_by_type_list_Count'] = $this->Home_model->get_search_by_type_list_Count();

        $this->load->view('header', $data);
        $this->load->view('bank_details');
        $this->load->view('footer');
    }



    public function whychooseasiahilux()
    {
        $data['title'] = "why choose Asia Hilux";
        $seo = $this->Home_model->get_row('hv_website_seo', array('hv_seo_id' => 2));
        $company = $this->Home_model->get_row('si_company', array('horizon_id' => 1));
        $data['keywords'] = $seo['Keywords'];
        $data['description'] = $seo['Description'];
        $data['slider'] = $company['company_web_slider'];

        $data['manufacturer'] = $this->Home_model->get_manufacturer();
        $data['car_bodytype_dropdown'] = $this->Home_model->body_type();
        $data['get_model_count'] = $this->Home_model->get_model_count();
        $data['get_make_count'] = $this->Home_model->get_make_count();
        $data['get_all_cars_count'] = $this->Home_model->get_all_cars_count();
        $data['get_make_count_country'] = $this->Home_model->get_make_count_country();
        $data['get_search_by_type_list_Count'] = $this->Home_model->get_search_by_type_list_Count();

        $this->load->view('header', $data);
        $this->load->view('why-choose-asia-hilux');
        $this->load->view('footer');
    }

    public function howtobuy()
    {
        $data['manufacturer'] = $this->Home_model->get_manufacturer();
        $data['car_bodytype_dropdown'] = $this->Home_model->body_type();
        $data['title'] = "How to Buy";
        $seo = $this->Home_model->get_row('hv_website_seo', array('hv_seo_id' => 2));
        $company = $this->Home_model->get_row('si_company', array('horizon_id' => 1));
        $data['keywords'] = $seo['Keywords'];
        $data['description'] = $seo['Description'];
        $data['slider'] = $company['company_web_slider'];

        $data['get_make_count'] = $this->Home_model->get_make_count();
        $data['get_model_count'] = $this->Home_model->get_model_count();
        $data['get_all_cars_count'] = $this->Home_model->get_all_cars_count();
        $data['get_all_car_image'] = $this->Home_model->get_all_car_image();
        $data['get_make_count_country'] = $this->Home_model->get_make_count_country();
        $data['get_search_by_type_list_Count'] = $this->Home_model->get_search_by_type_list_Count();

        $this->load->view('header', $data);
        $this->load->view('how-to-buy');
        $this->load->view('footer');
    }

    public function exportinformation()
    {
        $data['manufacturer'] = $this->Home_model->get_manufacturer();
        $data['car_bodytype_dropdown'] = $this->Home_model->body_type();
        $data['title'] = "Export Information";
        $seo = $this->Home_model->get_row('hv_website_seo', array('hv_seo_id' => 2));
        $company = $this->Home_model->get_row('si_company', array('horizon_id' => 1));
        $data['keywords'] = $seo['Keywords'];
        $data['description'] = $seo['Description'];
        $data['slider'] = $company['company_web_slider'];

        $data['get_model_count'] = $this->Home_model->get_model_count();
        $data['get_make_count'] = $this->Home_model->get_make_count();
        $data['get_all_cars_count'] = $this->Home_model->get_all_cars_count();
        $data['get_all_car_image'] = $this->Home_model->get_all_car_image();
        $data['get_make_count_country'] = $this->Home_model->get_make_count_country();
        $data['get_search_by_type_list_Count'] = $this->Home_model->get_search_by_type_list_Count();
        $this->load->view('header', $data);
        $this->load->view('export-information');
        $this->load->view('footer');
    }

    public function faq()
    {
        $data['manufacturer'] = $this->Home_model->get_manufacturer();
        $data['car_bodytype_dropdown'] = $this->Home_model->body_type();
        $data['title'] = "FAQ";
        $seo = $this->Home_model->get_row('hv_website_seo', array('hv_seo_id' => 2));
        $company = $this->Home_model->get_row('si_company', array('horizon_id' => 1));
        $data['keywords'] = $seo['Keywords'];
        $data['description'] = $seo['Description'];
        $data['slider'] = $company['company_web_slider'];

        $data['get_model_count'] = $this->Home_model->get_model_count();
        $data['get_make_count'] = $this->Home_model->get_make_count();
        $data['get_all_cars_count'] = $this->Home_model->get_all_cars_count();
        $data['get_all_car_image'] = $this->Home_model->get_all_car_image();
        $data['get_make_count_country'] = $this->Home_model->get_make_count_country();
        $data['get_search_by_type_list_Count'] = $this->Home_model->get_search_by_type_list_Count();

        $this->load->view('header', $data);
        $this->load->view('faq');
        $this->load->view('footer');
    }

    public function ourstaff()
    {
        $data['manufacturer'] = $this->Home_model->get_manufacturer();
        $data['car_bodytype_dropdown'] = $this->Home_model->body_type();
        $data['title'] = "Our Staff";
        $seo = $this->Home_model->get_row('hv_website_seo', array('hv_seo_id' => 2));
        $company = $this->Home_model->get_row('si_company', array('horizon_id' => 1));
        $data['keywords'] = $seo['Keywords'];
        $data['description'] = $seo['Description'];
        $data['slider'] = $company['company_web_slider'];

        $data['get_model_count'] = $this->Home_model->get_model_count();
        $data['get_make_count'] = $this->Home_model->get_make_count();
        $data['get_all_cars_count'] = $this->Home_model->get_all_cars_count();
        $data['get_all_car_image'] = $this->Home_model->get_all_car_image();
        $data['get_make_count_country'] = $this->Home_model->get_make_count_country();
        $data['get_search_by_type_list_Count'] = $this->Home_model->get_search_by_type_list_Count();

        $this->load->view('header', $data);
        $this->load->view('our-staff');
        $this->load->view('footer');
    }

    public function result($column, $value)
    {
        $data['manufacturer'] = $this->Home_model->get_manufacturer();
        $data['car_bodytype_dropdown'] = $this->Home_model->body_type();
        $company = $this->Home_model->get_row('si_company', array('horizon_id' => 1));
        $data['get_selected_cars'] = $this->Home_model->get_selected_cars_result($column, $value);
        $seo = $this->Home_model->get_row('hv_website_seo', array('hv_seo_id' => 2));
        $data['title'] = $seo['Title'];
        $data['keywords'] = $seo['Keywords'];
        $data['description'] = $seo['Description'];
        $data['slider'] = $company['company_web_slider'];
        if ($column == "RegistrationYear") {
            $data['year_from'] = $value;
        } else if ($column == "Bodytype") {
            $data['body_type'] = $value;
        }

        $data['get_make_count'] = $this->Home_model->get_make_count();
        $data['get_model_count'] = $this->Home_model->get_model_count();


        $data['get_all_cars_count'] = $this->Home_model->get_all_cars_count();

        $data['get_make_count_country'] = $this->Home_model->get_make_count_country();
        $data['get_search_by_type_list_Count'] = $this->Home_model->get_search_by_type_list_Count();
        $data['countrys'] = $this->Home_model->get_hv_port_country();

        $this->load->view('header', $data);
        $this->load->view('search');
        $this->load->view('footer');
    }



    public function sort_by($value)
    {
        $data['manufacturer'] = $this->Home_model->get_manufacturer();
        $data['car_bodytype_dropdown'] = $this->Home_model->body_type();
        $company = $this->Home_model->get_row('si_company', array('horizon_id' => 1));
        $data['get_selected_cars'] = $this->Home_model->get_by_sort($value);
        $seo = $this->Home_model->get_row('hv_website_seo', array('hv_seo_id' => 2));
        $data['title'] = $seo['Title'];
        $data['keywords'] = $seo['Keywords'];
        $data['description'] = $seo['Description'];
        $data['slider'] = $company['company_web_slider'];

        $data['get_make_count'] = $this->Home_model->get_make_count();
        $data['get_model_count'] = $this->Home_model->get_model_count();

        $data['get_all_cars_count'] = $this->Home_model->get_all_cars_count();
        $data['get_make_count_country'] = $this->Home_model->get_make_count_country();
        $data['get_search_by_type_list_Count'] = $this->Home_model->get_search_by_type_list_Count();
        $data['countrys'] = $this->Home_model->get_hv_port_country();

        $this->load->view('header', $data);
        $this->load->view('search');
        $this->load->view('footer');
    }



    public function get_cars()
    {
        header('Access-Control-Allow-Origin: *');
        $data = $this->Home_model->get_all_cars_for_sys();
        echo json_encode($data);
    }
    public function get_car($id)
    {
        header('Access-Control-Allow-Origin: *');
        $data = $this->Home_model->get_car_detail($id);
        echo json_encode($data);
    }
    public function get_car_images($id)
    {
        header('Access-Control-Allow-Origin: *');
        $data = $this->Home_model->select_where('hv_car_images', array('car_d_id' => $id));
        echo json_encode($data);
    }

    public function by_discount($price1, $price2)
    {

        $data['manufacturer'] = $this->Home_model->get_manufacturer();
        $data['car_bodytype_dropdown'] = $this->Home_model->body_type();
        $company = $this->Home_model->get_row('si_company', array('horizon_id' => 1));

        $data['get_selected_cars'] = $this->Home_model->by_discount($price1, $price2);

        $seo = $this->Home_model->get_row('hv_website_seo', array('hv_seo_id' => 2));

        $data['price_from'] = $price1;
        $data['price_to'] = $price2;

        $data['title'] = $seo['Title'];
        $data['keywords'] = $seo['Keywords'];
        $data['description'] = $seo['Description'];
        $data['slider'] = $company['company_web_slider'];

        $data['get_model_count'] = $this->Home_model->get_model_count();
        $data['get_make_count'] = $this->Home_model->get_make_count();

        $data['get_all_cars_count'] = $this->Home_model->get_all_cars_count();
        $data['get_make_count_country'] = $this->Home_model->get_make_count_country();
        $data['get_search_by_type_list_Count'] = $this->Home_model->get_search_by_type_list_Count();
        $data['countrys'] = $this->Home_model->get_hv_port_country();

        $this->load->view('header', $data);
        $this->load->view('search');
        $this->load->view('footer');
    }

    public function url_not_found()
    {
        $data['manufacturer'] = $this->Home_model->get_manufacturer();
        $data['car_bodytype_dropdown'] = $this->Home_model->body_type();
        $data['get_model_count'] = $this->Home_model->get_model_count();
        $data['get_make_count'] = $this->Home_model->get_make_count();
        $data['get_all_cars_count'] = $this->Home_model->get_all_cars_count();
        $data['get_all_car_image'] = $this->Home_model->get_all_car_image();
        $data['get_make_count_country'] = $this->Home_model->get_make_count_country();
        $data['get_search_by_type_list_Count'] = $this->Home_model->get_search_by_type_list_Count();

        $this->load->view('header', $data);
        $this->load->view('page_not_found');
        $this->load->view('footer');
    }


    public function ford()
    {
        $data['manufacturer'] = $this->Home_model->get_manufacturer();
        $data['car_bodytype_dropdown'] = $this->Home_model->body_type();
        $company = $this->Home_model->get_row('si_company', array('horizon_id' => 1));
        $data['get_selected_cars'] = $this->Home_model->get_all_cars_by_tag(0);
        $seo = $this->Home_model->get_row('hv_website_seo', array('hv_seo_id' => 2));
        $data['car_tag'] = 0;
        $data['title'] = $seo['Title'];
        $data['keywords'] = $seo['Keywords'];
        $data['description'] = $seo['Description'];


        $data['get_make_count'] = $this->Home_model->get_make_count();
        $data['get_model_count'] = $this->Home_model->get_model_count();
        $data['get_all_cars_count'] = $this->Home_model->get_all_cars_count();
        $data['get_make_count_country'] = $this->Home_model->get_make_count_country();
        $data['get_search_by_type_list_Count'] = $this->Home_model->get_search_by_type_list_Count();
        $data['countrys'] = $this->Home_model->get_hv_port_country();

        $this->load->view('header', $data);
        $this->load->view('search');
        $this->load->view('footer');
    }

    public function revo()
    {
        $data['manufacturer'] = $this->Home_model->get_manufacturer();
        $data['car_bodytype_dropdown'] = $this->Home_model->body_type();
        $data['title'] = "Revo";
        $seo = $this->Home_model->get_row('hv_website_seo', array('hv_seo_id' => 2));
        $company = $this->Home_model->get_row('si_company', array('horizon_id' => 1));
        $data['keywords'] = $seo['Keywords'];
        $data['description'] = $seo['Description'];
        $data['slider'] = $company['company_web_slider'];
        $data['get_all_cars_count'] = $this->Home_model->get_all_cars_count();
        $data['get_search_by_type_list_Count'] = $this->Home_model->get_search_by_type_list_Count();
        $this->load->view('header', $data);
        $this->load->view('revo');
        $this->load->view('footer');
    }

    public function double_cab()
    {
        $data['manufacturer'] = $this->Home_model->get_manufacturer();
        $data['car_bodytype_dropdown'] = $this->Home_model->body_type();
        $data['title'] = "Double Cab";
        $seo = $this->Home_model->get_row('hv_website_seo', array('hv_seo_id' => 2));
        $company = $this->Home_model->get_row('si_company', array('horizon_id' => 1));
        $data['keywords'] = $seo['Keywords'];
        $data['description'] = $seo['Description'];
        $data['slider'] = $company['company_web_slider'];

        $data['get_all_cars_count'] = $this->Home_model->get_all_cars_count();
        $data['get_search_by_type_list_Count'] = $this->Home_model->get_search_by_type_list_Count();

        $this->load->view('header', $data);
        $this->load->view('double_cab');
        $this->load->view('footer');
    }
    public function standard_cab()
    {
        $data['manufacturer'] = $this->Home_model->get_manufacturer();
        $data['car_bodytype_dropdown'] = $this->Home_model->body_type();
        $data['title'] = "Standard Cab";
        $seo = $this->Home_model->get_row('hv_website_seo', array('hv_seo_id' => 2));
        $company = $this->Home_model->get_row('si_company', array('horizon_id' => 1));
        $data['keywords'] = $seo['Keywords'];
        $data['description'] = $seo['Description'];
        $data['slider'] = $company['company_web_slider'];
        $data['get_all_cars_count'] = $this->Home_model->get_all_cars_count();
        $data['get_search_by_type_list_Count'] = $this->Home_model->get_search_by_type_list_Count();

        $this->load->view('header', $data);
        $this->load->view('standard_cab');
        $this->load->view('footer');
    }

    public function search()
    {
        $arr = !empty($_POST) ? $_POST : (!empty($_GET) ? $_GET : array());
        $data['clearance_sale'] = !empty($arr['clearance_sale']) ? $arr['clearance_sale'] : '';
        $data['make_id'] = !empty($arr['make_id']) ? $arr['make_id'] : '';
        $data['module'] = !empty($arr['module']) ? $arr['module'] : '';
        $data['fuel'] = !empty($arr['fuel']) ? $arr['fuel'] : '';
        $data['price_from'] = !empty($arr['price_from']) ? $arr['price_from'] : '';
        $data['price_to'] = !empty($arr['price_to']) ? $arr['price_to'] : '';
        $data['body_type'] = !empty($arr['body_type']) ? $arr['body_type'] : '';
        $data['steering'] = !empty($arr['steering']) ? $arr['steering'] : '';
        $data['transmission'] = !empty($arr['transmission']) ? $arr['transmission'] : '';
        $data['mileage_from'] = !empty($arr['mileage_from']) ? $arr['mileage_from'] : '';
        $data['mileage_to'] = !empty($arr['mileage_to']) ? $arr['mileage_to'] : '';
        $data['engine_capacity_from'] = !empty($arr['engine_capacity_from']) ? $arr['engine_capacity_from'] : '';
        $data['year_from'] = !empty($arr['year_from']) ? $arr['year_from'] : '';
        $data['month_from'] = !empty($arr['month_from']) ? $arr['month_from'] : '';
        $data['year_to'] = !empty($arr['year_to']) ? $arr['year_to'] : '';
        $data['month_to'] = !empty($arr['month_to']) ? $arr['month_to'] : '';
        $data['sort'] = !empty($arr['sort']) ? $arr['sort'] : '';
        $data['discounted'] = !empty($arr['discounted']) ? $arr['discounted'] : '';
        $data['refrence_no'] = !empty($arr['refrence_no']) ? $arr['refrence_no'] : '';
        $data['car_tag'] = !empty($arr['car_tag']) ? $arr['car_tag'] : '';
        $data['wheel_type'] = !empty($arr['wheel_type']) ? $arr['wheel_type'] : '';

        $data['get_selected_cars'] = $this->Home_model->filter($arr);
        $data['manufacturer'] = $this->Home_model->get_manufacturer();

        $data['car_bodytype_dropdown'] = $this->Home_model->body_type();
        $company = $this->Home_model->get_row('si_company', array('horizon_id' => 1));
        $seo = $this->Home_model->get_row('hv_website_seo', array('hv_seo_id' => 2));
        $data['title'] = $seo['Title'];
        $data['keywords'] = $seo['Keywords'];
        $data['description'] = $seo['Description'];
        $data['module_seo_detail'] = $this->Home_model->get_model_seo_details($data['module']);
        $data['car_models_content'] = $data['module_seo_detail']['car_models_content'];
        $data['get_make_count'] = $this->Home_model->get_make_count();
        $data['get_model_count'] = $this->Home_model->get_model_count();
        $data['get_all_cars_count'] = $this->Home_model->get_all_cars_count();
        $data['get_make_count_country'] = $this->Home_model->get_make_count_country();
        $data['get_search_by_type_list_Count'] = $this->Home_model->get_search_by_type_list_Count();
        $data['countrys'] = $this->Home_model->get_hv_port_country();

        $this->load->view('header', $data);
        $this->load->view('search');
        $this->load->view('footer');
    }
    
    public function login(){
        $this->load->view('login');
    }
    
    public function sign_up(){
        $this->load->view('sign_up');
    }
    
    public function dashboard(){
        $this->load->view('dashboard');
    }
    
    public function orderhistory(){
        $this->load->view('orderhistory');
    }
    
    public function cap(){
        $this->load->view('cap');
    }
    
    public function yourinformation(){
        $this->load->view('yourinformation');
    }
    
    public function consignee(){
        $this->load->view('consignee');
    }
    
    public function deposit(){
        $this->load->view('deposit');
    }
    
    public function preference(){
        $this->load->view('preference');
    }
    
    public function bookmark(){
        $this->load->view('bookmark');
    }
    
    public function canlist(){
        $this->load->view('canlist');
    }
    
    public function wishlist(){
        $this->load->view('wishlist');
    }
    
    public function edit_password(){
        $this->load->view('edit_password');
    }
    
    public function change_pwd(){
        $this->load->view('change_pwd');
    }

    public function signup(){
        $data = $this->input->post();
        
        echo '<pre>';print_r($data);die; 
    }
    // public function addCarToCountry(){
    //     $result = $this->db->get('hv_car_details')->result();
    //     foreach ($result as $value) {
    //         $data = null;
    //         $data = $this->db->where('car_d_id',$value->car_d_id)->get('si_countries_details')->row();
    //         if(empty($data)){
    //             $this->db->insert('si_countries_details', [
    //                 'car_d_id' => $value->car_d_id,
    //                 'country_detail_id' => 213,
    //                 'horizon_id' => 1
    //             ]);
    //         }
    //     }
    // }
}
