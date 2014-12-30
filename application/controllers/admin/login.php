<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('admin');
    }

    function index() {
        if ($this->session->userdata('sess_ci_admin_islogged') == 'true') {
            redirect("admin/dashboard");
        }
        
        
        
        $data['staff_group'] = "";
        $this->load->helper(array('form'));
        $this->load->view('layout/admin_header_login');
        $this->load->view('admin/login_page',$data);
        $this->load->view('layout/admin_footer');
    }

    public function login() {
        if ($this->session->userdata('sess_ci_admin_islogged') == 'true') {
            redirect("admin/dashboard");
        } elseif ($this->session->userdata('sess_ci_admin_lock') == 'true') {
            //$this->lockacc();
        } else {
            $data['title'] = "Login";
            $this->load->view('layout/admin_header');
            $this->load->view('admin/login_page',$data);
            $this->load->view('layout/admin_footer');
        }
        
    }

    public function dologin() {

        $this->load->model("admin");
        $login['email'] = $this->input->post('userName');
        $login['pass'] = $this->input->post('password');
        //$login['group_id'] = $_REQUEST['group_id'];
        $login['status'] = '1';
        if ($login['status'] == 1) {
            $result = $this->admin->isAdmin($login);
            if (count($result) != 0) {
                
                $this->session->set_userdata(array(
                    'sess_ci_admin_iadminid' => $result['0']->user_id,
                    'sess_ci_admin_vName' => $result['0']->first_name,
                    'sess_ci_admin_vEmailaddress' => $result['0']->email,
                    'sess_ci_admin_role' => 1,
                    'sess_ci_admin_lock' => false,
                    'sess_ci_admin_msg' => " Login Successfully. ",
                    'sess_ci_admin_msg_type' => 'success',
                    'sess_ci_admin_islogged' => true
                ));

                redirect("admin/dashboard");
               // $data['segment'] = $this->uri->segment(1);
            } else {
                $this->session->set_userdata(array(
                    'sess_ci_admin_msg' => "Invalid Login. ",
                    'sess_ci_admin_msg_type' => 'error',
                    'sess_ci_admin_islogged' => false
                ));
                redirect("admin/login");
            }
        }
    }

    public function logout() {

        $this->session->sess_destroy();
        $this->session->set_userdata(array(
            'sess_ci_admin_msg' => " You Have Logged Out successfully... ",
            'sess_ci_admin_msg_type' => 'success'
        ));
        redirect("admin/login");

    }
    public function insert_dummy_admin(){
        // a hard code login code
        $data['first_name'] = "Muhammad";
        $data['last_name'] = "Nauman";
        $data['email'] = "mhmmd.nauman@gmail.com";
        $data['password'] = md5("123456");
        $data['role_type'] = "ADMIN";
        $data['security_pin'] = "pin";
        $data['registration_date'] = date("Y-m-d h:i:s");
        $data['last_activity_date'] = date("Y-m-d h:i:s");
        $data['is_active'] = 1;
        
        $this->admin->insert_admin($data);
    }
    public function forgot_password() {

        $email = $this->input->post('femail');
        $data['title'] = "Login";
        //echo "select * from adminuser where vEmailaddress='".$email."' "; exit;

        $this->db->where('email', $email);
        $result = $this->db->get('pto_users')->result_array();
        if (count($result) > 0) {
			$psw = 'password';
            $this->db->where('pto_users', $email);
            $this->db->update('pto_users', array('password' => md5($psw)));
            $to = $email;
            $subject = 'Forgot Password';
            //$message = "<p>This email has been sent as a request to reset our password</p>";
            $message = '


		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MVAKHANI</title>

</head>
<body style="margin:0; font-size:13px; font-weight:normal; color:#000; background-color:#F1F1F1;">
<table width="680" border="0" cellspacing="0" cellpadding="0" style="margin:0 auto; height:700px">
  <tr>
    <td height="95" valign="top"><div style="width:680px;height:95px;background:#000;"><img src="' . base_url() . 'images/latest_logo.png" alt="" border="0" usemap="#Map" style="margin:0 250px;" /></div></td>
  </tr>
  <tr>
    <td valign="top" bgcolor="#fbfbfb"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><img src="' . base_url() . 'images/top-shadow.gif" alt="" width="680" height="35" border="0" /></td>
      </tr>
      <tr>
        <td align="center" valign="top" style="background:url(' . base_url() . 'images/rpt-shadow.gif) center top repeat"><table width="600" border="0" cellspacing="0" cellpadding="0">
          <tr align="center">
            <td valign="top" style=" font-size:36px">Forgotten Password</td>
            </tr>
          <tr>
            <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td>&nbsp;</td>
                </tr>
<tr>
                <td style="border-top:1px #d5d5d5 dotted">&nbsp;</td>
                </tr>
              <tr>
                <td height="20" align="center" style="color:#7e7e7e; line-height:25px; font-size:18px">Seems you have forgotten your password.<br />
                  Your New Password is :' . $psw . ' </td>
                </tr>

                <tr>
                <td>&nbsp;</td>
                </tr>
                                <tr>
                <td>&nbsp;</td>
                </tr>
                <tr>
                <td style="border-top:1px #d5d5d5 dotted">&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                </tr>

              </table></td>
            </tr>
        </table></td>
      </tr>
      <tr>
        <td><img src="' . base_url() . 'images/bottom-shadow.gif" alt="" width="680" height="35" border="0" /></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="center" valign="top"><table width="500" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="center" valign="top"><a href="http://www.facebook.com/" target="_blank" title="Facebook"><img src="' . base_url() . 'images/facebook.gif" alt="" width="67" height="19" border="0" /></a></td>
            <td align="center" valign="top"><a href="http://www.twitter.com/" target="_blank" title="Twitter"><img src="' . base_url() . 'images/twitter.gif" alt="" width="76" height="19" border="0" /></a></td>
            <td align="center" valign="top"><a href="http://www.pinterest.com/" target="_blank" title="Pinterest"><img src="' . base_url() . 'images/pinterest.gif" alt="" width="75" height="21" border="0" /></a></td>
            <td align="center" valign="top"><a href="#" target="_blank" title="Our Blog"><img src="' . base_url() . 'images/blog.gif" alt="" width="52" height="18" border="0" /></a></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>

<map name="Map" id="Map">
  <area shape="rect" coords="187,23,492,74" href="htttp://google.com" title="MVAKHANI" />
</map>
</body>
</html>

    ';

            $headers = 'From: support@admin.com' . "\r\n" .
                    'X-Mailer: PHP/' . phpversion() . "\r\n" .
                    'Content-Type: text/html; charset=ISO-8859-1' . "\r\n" .
                    'MIME-Version: 1.0' . "\r\n\r\n";

            if (mail($to, $subject, $message, $headers)) {
                //echo "yes";exit;
                $this->session->set_userdata(array(
                    'sess_ci_admin_msg' => "Password Retrieve on your Email-Id Successfully.",
                    'sess_ci_admin_msg_type' => 'success'
                ));
            } else {
                //echo "no";exit;
                $this->session->set_userdata(array(
                    'sess_ci_admin_msg' => "Email was not sent.",
                    'sess_ci_admin_msg_type' => 'error'
                ));
            };
        } else {
            $this->session->set_userdata(array(
                'sess_ci_admin_msg' => "Email Address not available.",
                'sess_ci_admin_msg_type' => 'error'
            ));
        }

        redirect('admin/login');
    }
}

    

?>