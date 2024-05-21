<?php
require("C:/xampp/htdocs/touriset/model/customer_service.php");
require("C:/xampp/htdocs/touriset/model/porfile.php");
$customer = new customer_service();
$user = new  user();
if(isset($_POST["submit"]))
{
    $value=$_POST["submit"];
    switch($value)
    {
        case 'Save':
            {
                $place=$_POST['place'];
                $city=$_POST['city'];
                $cityimg=$_POST['cityphoto'];
                $catgory=$_POST['catgory'];
                $catgoryimg=$_POST['catgoryphoto'];
                $link=$_POST['link'];
                $video=$_POST['video'];
                $description=$_POST["description"];
                $price=$_POST["price"];
                $customer->add($place,$city,$cityimg,$catgory,$catgoryimg,$link,$video,$description,$price);

            }
            break;
            case 'update':
                {
                $place=$_POST['place'];
                $city=$_POST['place2'];
                $link=$_POST['link'];
                $customer->edit($place,$city,$link);

                }
                break;
                case 'Delete':
                    {
                        $place=$_POST['place'];
                        $customer->delete($place);
                    }
                    break;
                    case 'Sign UP':
                        {
                            $username=$_POST['username'];
                            $email= $_POST['email'];
                            $password=$_POST['password'];
                            $user->register($username,$email,$password);
                        }
                        break;
                    case 'Sign in':
                        {
                            $email= $_POST['emails'];
                            $password=$_POST['passwords'];
                            $user->login($email, $password);
                        }
                        break;
                        case 'save':
                            {
                                //$id=["id"];
                                $place=$_POST['place_name'];
                                $userss=$_POST['user'];
                                $user->saving($place,$userss);
                            }
                            break;
                            case 'rate':
                                {
                                    $rate_place=$_POST['rate_place'];
                                    $user_rate=$_POST['user_rate'];
                                    if(isset($_POST['rating']))
                                    $rate=$_POST['rating'];
                                    $user->rate($rate_place,$rate,$user_rate);
                                }
    }
}
?>