<?php
    include "db_config.php";
        class user
        {
            public $db;
            public function __construct()
            {
                $this->db=new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,'hotel');
                if(mysqli_connect_errno())
                {
                    echo "Error: Could not connect to database.";
                    exit;
                }
            }
            public function reg_user($name, $username, $password, $email)
            {
                //$password=md5($password);
                $sql="SELECT * FROM manager WHERE uname='$username' OR uemail='$email'";
                $check=$this->db->query($sql);
                $count_row=$check->num_rows;
                if($count_row==0)
                {
                    $sql1="INSERT INTO manager SET uname='$username', upass='$password', fullname='$name', uemail='$email'";
                    $result= mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");
                    return $result;
                }
                else
                {
                    return false;
                }
            }
            
            
            public function add_room($roomname, $room_qnty, $no_bed, $bedtype,$facility,$price)
            {
                
                    $available=$room_qnty;
                    $booked=0;
                    
                    $sql="INSERT INTO room_category SET roomname='$roomname', available='$available', booked='$booked', room_qnty='$room_qnty', no_bed='$no_bed', bedtype='$bedtype', facility='$facility', price='$price'";
                    $result= mysqli_query($this->db,$sql);
                
                
                    for($i=0;$i<$room_qnty;$i++)
                    {
                        $sql2="INSERT INTO rooms SET room_cat='$roomname', price_per_night='$price', book='false'";
                        mysqli_query($this->db,$sql2);
                        
                    }
					
                
                    return $result;
                

            }
            
			//put the search/report generation logic here
            public function check_available($checkin, $checkout)
            {
                
                
                   $sql="SELECT DISTINCT room_cat FROM rooms WHERE room_id NOT IN (SELECT DISTINCT room_id
   FROM rooms WHERE (checkin <= '$checkin' AND checkout >='$checkout') OR (checkin >= '$checkin' AND checkin <='$checkout') OR (checkin <= '$checkin' AND checkout >='$checkin') )";
                    $check= mysqli_query($this->db,$sql)  or die(mysqli_connect_errno()."Query Doesnt run");;

                
                    return $check;
                

            }
            
            
            
            
            public function booknow($checkin, $checkout, $name, $num_of_night, $roomNum, $cus_id, $phone, $roomname, $username, $date)
            {
                    
                    $sql="SELECT * FROM rooms WHERE room_cat='$roomname' AND (room_id NOT IN (SELECT DISTINCT room_id
   FROM rooms WHERE checkin <= '$checkin' AND checkout >='$checkout'))";
                    $check= mysqli_query($this->db,$sql)  or die(mysqli_connect_errno()."Data here cannot inserted");
                 
                    if(mysqli_num_rows($check) > 0)
                    {
                        $row = mysqli_fetch_array($check);
                        $id=$row['room_id'];
						$price=$row['price_per_night'];
						
                        
                        $sql2="UPDATE rooms  SET checkin='$checkin', checkout='$checkout', name='$name', num_of_night='$num_of_night', cus_id='$cus_id', phone='$phone', book='true' WHERE room_id=$id";
                         $send=mysqli_query($this->db,$sql2);
						 
						 $total_price = $num_of_night * $price;
						 
						 //add to customers table
						 $sql="INSERT INTO customers SET room_id='$id', name='$name', id_num='$cus_id', phoneno='$phone', checkin='$checkin', checkout='$checkout', room_categ='$roomname', room_num='$roomNum', price_per_night='$price', num_of_night='$num_of_night', total_price='$total_price', booking_status='checkedIn', admin_name='$username'";
						$sendCus= mysqli_query($this->db,$sql) or die(mysqli_connect_errno()."Data cannot inserted");
						 
					
                        if($send && $sendCus)
                        {
                            $result="Your Room has been booked!!";
                        }
                        else
                        {
                            $result="Sorry, Internel Error";
                        }
                    }
                    else                       
                    {
                        $result = "No Room Is Available";
                    }
                    
                    
                
                    return $result;
                

            }
			
			public function roomNum($room_id, $roomNum)		
            {
                                
                        $sql2="UPDATE rooms  SET room_number='$roomNum' WHERE room_id=$room_id";
                         $send=mysqli_query($this->db,$sql2);
                        if($send)
                        {
                            $result="Room number has been added!!";
                        }
                        else
                        {
                            $result="Sorry, Internel Error";
                        }
                    
                
                    return $result;
                

            }
            
            
            
            
             public function edit_all_room($checkin, $checkout, $name, $num_of_night, $cus_id, $phone, $id, $room_price, $username)
            {
                        $sql2="UPDATE rooms  SET checkin='$checkin', checkout='$checkout', name='$name',  cus_id='$cus_id', phone='$phone', num_of_night='$num_of_night', book='true' WHERE room_id=$id";
                         $send=mysqli_query($this->db,$sql2);
						 
						 $totalprice = $num_of_night * $room_price;
						 $date = date('Y-m-d H:i:s');
						 
						$sql="UPDATE customers  SET checkin='$checkin', checkout='$checkout', name='$name', id_num='$cus_id',  phoneno='$phone', num_of_night='$num_of_night', total_price='$totalprice', admin_name='$username' WHERE room_id=$id";
                         $cusEdit=mysqli_query($this->db,$sql) or die(mysqli_connect_errno()."Data cannot inserted");
                        if($send && $cusEdit)
                        {
                            $result="Booking details have been updated!!";
                        }
                        else
                        {
                            $result="Sorry, Internel Error";
                        }
                
                    return $result;
                

            }
            
			public function edit_room_number($room_number, $room_id)
            {
                        $sql2="UPDATE rooms  SET room_number='$room_number' WHERE room_id=$room_id";
                        $send=mysqli_query($this->db,$sql2);

                        if($send)
                        {
                            $result="Room number has been updated!!";
                        }
                        else
                        {
                            $result="Sorry, Internel Error";
                        }
                
                    return $result;
                

            }
            
            
            
            
             public function edit_room_cat($roomname, $room_qnty, $no_bed, $bedtype,$facility,$price,$room_cat)
            {
                    
                 
                        $sql2="DELETE FROM rooms WHERE room_cat='$room_cat'";
                        mysqli_query($this->db,$sql2);
                 
                 
                        for($i=0;$i<$room_qnty;$i++)
                        {
                            $sql3="INSERT INTO rooms SET room_cat='$roomname', book='false'";
                            mysqli_query($this->db,$sql3);

                        }

                 
                        $available=$room_qnty;
                        $booked=0;
                 
                        $sql="UPDATE room_category  SET roomname='$roomname', available='$available', booked='$booked', room_qnty='$room_qnty', no_bed='$no_bed', bedtype='$bedtype', facility='$facility', price='$price' WHERE roomname='$room_cat'";
                         $send=mysqli_query($this->db,$sql);
                        if($send)
                        {
                            $result="Updated Successfully!!";
                        }
                        else
                        {
                            $result="Sorry, Internel Error";
                        }
  
                    
                
                    return $result;
                

            }
            
            
            
            
            
            public function check_login($emailusername,$password)
            {
                //$password=md5($password);
                $sql2="SELECT uid, fullname from manager WHERE uemail='$emailusername' OR uname='$emailusername' and upass='$password'";
                $result=mysqli_query($this->db,$sql2);
                $user_data=mysqli_fetch_array($result);
                $count_row=$result->num_rows;
                
                if($count_row==1)
                {
                    $_SESSION['login']=true;
                    $_SESSION['uid']=$user_data['uid'];
					$_SESSION['fullname']=$user_data['fullname'];
                    return true;    
                }
                else
                {
                    return false;
                }
            }

            public function get_session()
            {
                return $_SESSION['login'];
            }
            public function user_logout()
            {
                $_SESSION['login']=false;
                session_destroy();
            }
        }

?>