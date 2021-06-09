<?php

			$con=mysqli_connect('localhost','root','','xdatest');


					$query=mysqli_query($con,'select test.pincode,city.id as city_id,district.id as d_id,state.id as s_id from test join city on city.city=test.city_id join district  on district.district_name=test.district_id join state on state.state=test.state_id LIMIT 1000')or die('Error'.mysqli_error($con));


								$res=mysqli_fetch_array($query);
								var_dump($res);

?>