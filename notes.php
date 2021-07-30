string Helper:-
random_string('alnum', 16);


increment_string('file', '-', 2);


for ($i = 0; $i < 10; $i++)
{
    echo alternator('string one', 'string two');
}


repeater($string, 30);


reduce_double_slashes($string);


trim_slashes($string);


reduce_multiples($string,",");



========================================

Cookie Helper:-
         
set_cookie("name","test cookie",3600);
echo get_cookie("name");
delete_cookie("name");

=======================================

Download Helper:-
$data=file_get_contents(base_url().'img/7.jpg');
$name="file_download.jpg";
force_download($name,$data);
======================================

Inflector Helper
$word = "dogs";
echo singular($word);
 // Returns "dog"


$word = "dog";
echo plural($word); 
// Returns "dogs"


$word = "my_dog_spot";
echo camelize($word);
 // Returns "myDogSpot"


$word = "my dog spot";
echo underscore($word);
 // Returns "my_dog_spot"


$word = "my_dog_spot";
echo humanize($word);
 // Returns "My Dog Spot"
 ==========================================
 Array Helper:-

Element():-
$array = array('color' => 'red', 'shape' => 'round');
echo element('color', $array);
//return red


random_element():-
$quotes = array(
            "I Suman",
            "I Neha",
            "I Rahul"
            );
echo random_element($quotes);


Elements():-
$array = array(
'color' => 'red',
'shape' => 'round',
'radius' => '10',
'diameter' => '20'
);
$my_shape = elements(array('color','shape','height'),$array);
============================================
Email Helper:-
$this->load->helper('email');

if (valid_email('email@somesite.com'))
{
    echo 'email is valid';
}
else
{
    echo 'email is not valid';
}
=============================================
Url Helper:-
site_url("news/local/123");
base_url("blog/post/123");
current_url()
uri_string()
anchor()
anchor_popup()
============================================
File Helper:- 

$string=read_file(APPPATH."controllers/User.php");
echo $string;

$data=".c{ color : red;}";
write_file(APPPATH."../css/style.css",$data,'r+');


delete_files(APPPATH."../css",TRUE);


$fil=get_filenames(APPPATH."controllers");
print_r($fil);
//print file name


$file=get_file_info(APPPATH."controllers");
print_r($file);
//print file path and size
==============================================
$this->load->library('calendar');

echo $this->calendar->generate();
echo $this->calendar->generate(2006, 6);
=============================================
$this->benchmark->mark('start');

// Some code happens here

$this->benchmark->mark('end');

 $this->benchmark->elapsed_time('start', ‘end');

$this->benchmark->memory_usage();
===========================================
Image Upload:-
$config['upload_path'] = './img/';
$config['allowed_types'] = 'jpg|jpeg|png';
$this->load->library('upload', $config);
$data["error"]="";
if ( ! $this->upload->do_upload("pic"))
{
if(isset($_FILES["pic"]))
{
    $data["error"]=$this->upload->display_errors();
}

$this->load->view('form', $error);
}
else
{
$data = $this->upload->data();
echo $filename=$data["file_name"];
echo "<br>";
echo $path=$data["full_path"];
// $this->load->view('upload_success', $data);
===========================================
$this->load->library('encrypt');
$string="suman";
$en=$this->encrypt->encode($string);
echo $de=$this->encrypt->decode($en)
===========================================
Custom library
Goto application/library folder.
Create a new file ex-
Test.php
Class Test
{
    function abc()
    {
    Echo "abc function";
    }
}
Notes:- file name and class name are same
=========================================
Extends Library:-
<?php
//application/library/My_Email.php
//Extends Email Library
class My_Email extends CI_Email
{
    function test()
     {
       echo "This Is Extends Email Class";
     }
}
?>
$this->load->library(“email”);
$this->email->test();

OutPut:- This Is Extends Email Class
=========================================
Custom Helper:-
Application/helper/test_helper.php
<?php
function add($a,$b)
{
    return $a+$b;
}
?>
Controller:-
$this->load->helper("test");
echo add(2,4);
==========================================
Extends Helper:-
Application/helper/MY_array_helper.php
Here I Use Array Helper. So My Name is
MY_array_helper.php
<?php
function test()
{
   echo "This Is test";
}
?>
Controller:-
$this->load->helper(“array”);
Test();
OutPut:-This is test
========================================
Override Helper Function:-
<?php
//give file name MY_array_helper.php
function element()
{
  echo "This Is element test";
}
?>

Controller:-
$this->load->helper("array");
$array=array("color"=>"red","name"=>"suman");
echo element("name",$array);

OutPut:- This Is element test
======================================
Insert_Batch:-

$record=array(
  array("name"=>"Micki"),
  array("name"=>"Suman")
);
$this->db->insert_batch("student",$record);
======================================
Update : -

$record=array(
    "std_name"=>"Ram",
    "std_roll"=>4
);
$this->db->where("id",3);
$qry=$this->db->update("student",$record);
=====================================
Update Batch:-

$record=array(
 array("id"=>4,"std_name"=>"Rahul 1"),
 array("id"=>5,"std_name"=>"Sishu 2")
);
$this->db->update_batch("student",$record,"id");
//Update Batch me 3 parameter leta hai
====================================
Count All ():-

echo $this->db->count_all("student");
=====================================
Num Rows:-

$qry=$this->db->get("student");
echo $qry->num_rows();
=====================================
Count _all_result():-
//count record with with condition check
$this->db->where('std_name', 'Ram');
$this->db->from('student');
echo $this->db->count_all_results();
======================================
Where Condition :- 

$this->db->select("*");
$this->db->from("student");
$this->db->where("std_name","Ram");
$qry=$this->db->get();
Ex:-
//SELECT * FROM `student` WHERE `std_name`='Ram'

======================================
or_where:-

$this->db->select("*");
$this->db->from("student");
$this->db->where("std_name","Ram");
$this->db->or_where("id",4);
$qry=$this->db->get();
Ex:-
SELECT * FROM `student` WHERE `std_name` = 'Ram' OR `id` = 4
======================================
Like:- 

$this->db->select("*");
$this->db->from("student");
$this->db->like("std_name","a");
$this->db->get();
======================================

or_like:-

$this->db->select("*");
$this->db->from("student");
$this->db->like("std_name","a");
$this->db->or_like("std_name","h");
$this->db->get();
//Both like condition check
=======================================
Empty_table:-
$this->db->empty_table('mytable');
// Ex
// DELETE FROM mytable
======================================
truncate:-
$this->db->truncate('mytable');
// Ex:
// TRUNCATE mytable
======================================
//for image
echo img(base_url('img/dextop.jpg'));
====================================
//for space
echo nbs(3);
===================================
//for heading
echo heading('Welcome!', 3, 'class="pink"')
===================================
//for break
echo br(3);
================================
Basic CodeIgniter URL structure?

abc.com/class/function/ID
================================
Routing--


Routing is a technique by which you can define your URLs according to the requirement instead of using the predefined URLs.

=====================================
Pre_system:--
Library se pahle call hota hai

Post_system:-
Library load ke bad call hota hai

Pre_controller:-
Controller load ke pahle call hota hai

Post_controller:-
Controller load ke bad call hota hai

Display_override:-
Msg ko hooks ki help se change karna.ex man le ki bahut sare page par ek masg hai jo ab change karna hai to us case me ya to sare page pe jakar change kare ya hooks ki help se change kare

Hooks-> config->hooks.php

$hook['dispaly_override']=array(
'class'   =>'replacetoken',
'function'  => 'replace',
'filename' => 'chang.php',
'filepath'  =>'hooks'
);

Goto application-> hooks and create chang.php file
========================================
Form Validation :-
$this->load->library('form_validation');

$this->form_validation->set_rules('name', 'Name', 'required');

if($this->form_validation->run() == FALSE)
{
  $this->load->view('myform');
}
else
{
  $this->load->view('formsuccess');
}

Method :-
(1)required
(2)matches[form_item]
(3)is_unique[table.field]
(4)min_length[6]
(5)max_length[12]
(6)exact_length[8]
(7)greater_than[8]
(8)less_than[8]
(9)alpha
(10)alpha_numeric
(11)numeric
(12)integer
(13)decimal
(14)is_natural // naturalNum:0,1,2,3...
(15)valid_email
(16)valid_emails //comma separated
(17)valid_ip
========================================
Security helper : -
echo hash("sha1", "suman");
        
echo hash("md5", "suman");


strip_image_tags:-
image convert to string
echo strip_image_tags (img(base_url('./img/dextop.jpg')));
Output:-
http://localhost/ci/blog3/./img/dextop.jp
==========================================
num_rows:-

$this->db->where('EmpID >=', 5);
$query = $this->db->get('Employees');
echo $query->num_rows();

// Outputs, 4
==========================================
count_all_results():-

$this->db->select('*');
$this->db->from('Employees');
$this->db->like('Designation', 'Manager');
echo $this->db->count_all_results();

// Outputs, 2
==========================================
count_all :-

echo $this->db->count_all('Employees');

// Outputs, 8
==========================================
Join

$qry=$this->db->select (*)
                 ->from(student)
                 ->join('library','student.Id=library.std_Id')
                  Get();
===========================================
xss_clean:-

go to config and search $config['global_xss_filtering']=TRUE;
$this->load->helper('security');
$this->security->xss_clean($data);

===========================================
Cross-site request forgery (CSRF)

go to config and search 
$config['csrf_protection']=TRUE;

$csrf = array(
'name' => $this->security->get_csrf_token_name(),
'hash' => $this->security->get_csrf_hash()
);
<input name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>">

hash randum key hota hai.
===========================================
Dompdf:-

$img="<img src='".base_url().'img/'.$row->pic."'>";
$this->pdf->loadHtml($output);
$this->pdf->render();
$this->pdf->stream("".$name.".pdf", array("Attachment"=>0));


library/Pdf.php
require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;

class Pdf extends Dompdf
{
 public function __construct()
 {
   parent::__construct();
 } 
}
=============================================
Pagination:-

$this->load->library('pagination');
$config['base_url'] = base_url("Admin/all_post");;
$config['total_rows'] = $this->Admin_model->total();
$config['per_page'] = 2;
$config['full_tag_open']="<ul class='pagination'>";
$config['full_tag_close']="</ul>";

$config['next_tag_open']="<li>";
$config['next_tag_close']="</li>";

$config['prev_tag_open']="<li>";
$config['prev_tag_close']="</li>";

$config['num_tag_open']="<li>";
$config['num_tag_close']="</li>";


$config['cur_tag_open']="<li class='active'><a>";
$config['cur_tag_close']="</a></li>";


$this->pagination->initialize($config);
$qry["data"]=$this->Admin_model->all_post_model($config['per_page'],$this->uri->segment(3));

$this->load->view("admin/all_post",$qry);
======================================================
Pagination:-

$this->load->library('pagination');
$config=[
    "base_url"=>base_url('Home/index'),
    "total_rows"=>8,
    "per_page"=>2,

    "full_tag_open"=>"<ul>",
    "full_tag_close"=>"</ul>",
    "next_tag_open"=>"<li>",
    "next_tag_close"=>"</li>",
    "prev_tag_open"=>"<li>",
    "prev_tag_close"=>"</li>",
    "num_tag_open"=>"<li>",
    "num_tag_close"=>"</li>",
    "cur_tag_open"=>"<li><a>",
    "cur_tag_close"=>"</a></li>",
    "last_tag_open"=>"<li>",
    "last_tag_close"=>"</li>",
    "first_tag_open"=>"<li>",
    "first_tag_close"=>"</li>",
];
$this->pagination->initialize($config);
$qry["data"]=$this->Model1->show($config['per_page'],$this->uri->segment(3));
$this->load->view("home",$qry);
============================================================
Dynemic Field Add :-

var i=1;
$("#add").click(function(e){
e.preventDefault();
i++;
$("#mytable").append('<tr id="row'+i+'">
<td>Name : <input type="text" name="name[]" id="name" class="form-control name_list"></td>
<td><br><button name="remove" id="'+i+'" class="btn btn-success btn_remove">X</button></td></tr>');
});

for($i=0;$i<count($pan);$i++)
{
    $dat=array(
        "name"=>$name[$i],
    );
    $this->Model1->pan_model($dat);  
    //array value insert
}
============================================================
Time and Date:-

<?php echo date("d-m-Y", strtotime($atten->date)); ?>
<?php  echo date('h:i a', strtotime($atten->time));  ?>

<?php 
//entry in atendance login time
$entry=strtotime($atten->time);
//end is attendance checkout time
$end=strtotime($atten->checkout);
$seconds=$end-$entry;
$minutes=$seconds/60;
if($atten->checkout!=NULL)
{
echo $hours = intdiv($minutes, 60).' Hour . '. ($minutes % 60)." Min";
}
else
{
    echo "0 Hour";
}
?>
===========================================================
Two Image upload:-

$this->load->library('upload');


$config['upload_path'] = './img/';
$config['allowed_types'] = 'gif|jpg|png';
$this->upload->initialize($config);
$this->upload->do_upload("pan");
$pan_image=$this->upload->data();
$pan=$pan_image["file_name"];

//print_r($pan_image)   ;
$config['upload_path'] = './img/';
$config['allowed_types'] = 'gif|jpg|png';
$this->upload->initialize($config);
$this->upload->do_upload("adhar");
$adhar_image=$this->upload->data();
$adhar=$adhar_image["file_name"];

$data=array(
    "pan"=>$pan,
    "adhar"=>$adhar,
    "name" => "Suman"
);

$this->Model1->image_model($data);                  
========================================================
How to get Last Insert Id In Codeigniter
return $this->db->insert_id();
===================================================
// for radio update
if(jdata[0].gender=="Male")
{
  $("#e_gender1").attr("checked",true);
}
if(jdata[0].gender=="Female")
{
  $("#e_gender2").attr("checked",true);
}
//for checkbox(indexOf return index if not found then return -1)
var q=jdata[0].qualification;
if(q.indexOf('MCA')!='-1')
{
  $("#e_q1").attr("checked",true);
}
if(q.indexOf('BCA')!='-1')
{
  $("#e_q2").attr("checked",true);
}
if(q.indexOf('B.Tech')!='-1')
{
  $("#e_q3").attr("checked",true);
}
====================================================
How to Multiple value store in session:-

if($qry)
{
foreach($qry as $row)
{
    $ary=array("id"=>$row->id,"email"=>$row->email);
    $this->session->set_userdata("sess_name",$ary);
}
$sess=$this->session->userdata("sess_name");
echo $sess["id"];
}
====================================================
PDF MAIL :-

$this->pdf->loadHtml($output);
$this->pdf->render();
$out=$this->pdf->output();
$filename="docu.pdf";
file_put_contents('mail/'.$filename,$out);



$to="theequicomgr8@gmail.com";
$subject="Work On Mail Library In Codeigniter";
$from="suman.krgr8@gmail.com";
$content="<!DOCTYPE html><html><head><title></title></head><body><table border='1'>";
$content.="<tr><td>";
$content.="This Is Message Part";
$content.="</td></tr></body></html>";

$config["protocol"]='smtp';
$config["smtp_host"]="ssl://smtp.gmail.com";
$config["smtp_port"]="465";
$config["smtp_timeout"]="60";

$config["smtp_user"]="suman.krgr8@gmail.com";
$config["smtp_pass"]="cmmmjqdegkilgkpv";

$config["charset"]="utf-8";
$config["newline"]="\r\n";
$config["mailtype"]="html";
$config["validation"]=TRUE;

$this->email->initialize($config);
$this->email->set_mailtype("html");
$this->email->from($from);
$this->email->to($to);
$this->email->subject($subject);
$this->email->attach('mail/docu.pdf');
$this->email->message($content);
if($this->email->send())
{
    echo "success";
}
else
{
    echo "error";
}

echo $this->email->print_debugger();

==================================
Hook For session Check:-

config/hook.php

$hook['post_controller_constructor'][] = array(
       'class'    => 'Authenticate',
       'function' => 'check_user_login',
       'filename' => 'Authenticate.php',
       'filepath' => 'hooks',
       'params'   => array()
       );


Hook folder ke under/
<?php
class Authenticate{
  public function check_user_login(){
      $this->CI = & get_instance();
      if(!$this->CI->session->userdata('sess_name')){
          echo "Not Set";    
      }
      else
      {
        echo "Set";
      }
  }
}
?>
======================================
Multiple File Upload:-
<div class="container">
    <div class="col-xl-6">
        <form method="post" action="<?php echo base_url('Home/upload'); ?>" enctype="multipart/form-data">
            <div class="form-group">
                <label>Image : </label>
                <input type="file" name="files[]" class="form-control" multiple="">
            </div>
            <input type="submit" class="btn btn-info">
        </form>
    </div>
</div>

function upload()
    {           
        $this->load->library('upload');
        $count = count($_FILES['files']['name']);

        for($i=0;$i<$count;$i++)
        {  
            $_FILES['file']['name'] = $_FILES['files']['name'][$i];
            $_FILES['file']['type'] = $_FILES['files']['type'][$i];
            $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
            $_FILES['file']['error'] = $_FILES['files']['error'][$i];
            $_FILES['file']['size'] = $_FILES['files']['size'][$i];

            $config['upload_path'] = './img/'; 
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = '5000';
            // $config['file_name'] = $_FILES['file']['name'][$i];
            $this->upload->initialize($config);
            $this->upload->do_upload('file');
            $uploadData = $this->upload->data();
            $filename = $uploadData['file_name'];        
            $qry=$this->db->insert("upload",array("files"=>$filename));
        }
        redirect('Home');
    }

======================================================

Import CSV:-
function csvupload()
{
    $filename=$_FILES["file"]["tmp_name"];// temp file name
    if($_FILES["file"]["size"] > 0) //if file empity na ho
    {
        $file=fopen($filename, 'r');
        while(($getdata=fgetcsv($file,1000,","))!==FALSE)
        {
            $email=$getdata['2'];
            $qry1=$this->StudentModel->check($email);
            if($qry1  >0)
            {
                $this->db->where("email",$email);
                $updateqry=$this->db->update("student",array('name'=>$getdata[1],'email'=>$getdata[2],'password'=>$getdata[3],'mobile'=>$getdata[4]));
            }
            else
            {
                $qry=$this->db->insert("student",array('name'=>$getdata[1],'email'=>$getdata[2],'password'=>$getdata[3],'mobile'=>$getdata[4]));
            }
        }

    }
    redirect("StudentController/profile");
}


On Model:-
function check($email)
{
    $this->db->select("*");
    $this->db->from("student");
    $this->db->where("email",$email);
    return $this->db->count_all_results();
}


On view:-
<div id="modal">
    <div id="modal-form">
        <h2>CSV File Upload...</h2>
        <form method="post" action="<?php echo base_url().'StudentController/csvupload' ?>" enctype="multipart/form-data">
            <div class="form-group">
                <label>File : </label>
                <input type="file" name="file" id="file" class="form-control">
            </div>
            <input type="submit" name="submit" value="Upload" class="btn btn-info">
        </form>
    </div>
</div>
=================================================

Export:-
function export()
{
    $qry=$this->StudentModel->showdata("student","*");
    $output="<table style='border:1px solid red;'>";
    foreach($qry as $row)
    {
        $output.="
            <tr>
            <td>".$row->name."</td>
            <td>".$row->email."</td>
            <td>".$row->password."</td>
            <td>".$row->mobile."</td>
            <td>".$row->country_name."</td>
            <td>".$row->state_name."</td>
            <td>".$row->city_name."</td>
            </tr>
        ";
    }
    $output.="</table>";
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="feedback Data.xls"');
    // header("Content-Type : application/xls");
    // header("Content-Dispositon : attachment; filename=data.xls");
    echo $output;
}

On View:-
<form method="post" action="<?php echo base_url().'StudentController/export' ?>">
    <input type="submit" value="Export" class="btn btn-success" >
</form>
================================================


