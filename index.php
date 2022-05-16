<?php
    // $command = escapeshellcmd('python3 scripts/scrapper.py');
    // $output = shell_exec($command);
    // $jobs = json_decode($output);
    // var_dump($jobs);
    // exec ('python3 scripts/scrapper.py', $output);
    // $jobs = ($output);
    // $job_list = array();
    // $k = 0;
    // for($i = 0; $i <= count($jobs); $i++){
    //     $job_list[] = explode('", "', $jobs[$i]);
    //     $k++;
    // }
    // echo '<pre>';
    // echo gettype($jobs[0]);
    // echo $_SERVER['DOCUMENT_ROOT'] .__DIR__.'/scripts/tmp/mydict.json';die;
    $jobs = file_get_contents('jobs.json');
    $jobs = json_decode($jobs);

    // switch (json_last_error()) {
    //     case JSON_ERROR_NONE:
    //         echo ' - No errors';
    //     break;
    //     case JSON_ERROR_DEPTH:
    //         echo ' - Maximum stack depth exceeded';
    //     break;
    //     case JSON_ERROR_STATE_MISMATCH:
    //         echo ' - Underflow or the modes mismatch';
    //     break;
    //     case JSON_ERROR_CTRL_CHAR:
    //         echo ' - Unexpected control character found';
    //     break;
    //     case JSON_ERROR_SYNTAX:
    //         echo ' - Syntax error, malformed JSON';
    //     break;
    //     case JSON_ERROR_UTF8:
    //         echo ' - Malformed UTF-8 characters, possibly incorrectly encoded';
    //     break;
    //     default:
    //         echo ' - Unknown error';
    //     break;
    // }
    // echo(gettype($jobs));
    // echo PHP_EOL;
    // foreach($jobs as $job){
    //     var_dump($job);
    // }
    // print_r($jobs);
    // die();

//     foreach($jobs as $job){
//         echo $job->job_title.'<br>';
//         echo $job->job_location.'<br>';
//         echo $job->job_description.'<br>';
//         echo 'https://civica-inc.hiringthing.com/'.$job->job_link.'<hr>';
//     }
// die();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Civika - HiringThing</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- custome stylesheet -->
    <link rel="stylesheet" href="css/style.css">
    <!-- FACEBOOK SHARE -->
    <meta property="og:url"           content="https://civica-inc.hiringthing.com/" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="Civika - HiringThing" />
    <meta property="og:description"   content="Civika - HiringThing: Description goes here" />
    <meta property="og:image"         content="https://d161ew7sqkx7j0.cloudfront.net/public/images/logos/17874_5725_civica_logo.png" />
    <!-- TWITTER SHARE -->
    <meta name="twitter:title" content="ECivika - HiringThing">
    <meta name="twitter:description" content="Civika - HiringThing: Description goes here">
    <meta name="twitter:image" content="https://d161ew7sqkx7j0.cloudfront.net/public/images/logos/17874_5725_civica_logo.png">
    <meta name="twitter:card" content="summary_large_image">
</head>
<body>
    <nav>
        <div class="nav-wrapper">
            <a href="#" class="brand-logo center">CIVIKA - HiringThing</a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <!-- Uncomment below ul tag if menu is needed -->
            <!-- <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="#">Menu</a></li>
                <li><a href="#">Menu</a></li>
                <li><a href="#">Menu</a></li>
            </ul> -->
        </div>
    </nav>
    <div id="form-job-search" class="container">
        <div class="row">
            <div class="col s12"><h4>Career Opprertunity</h4><hr /></div>
        </div>
        <div class="row">
            <form class="col s12">
                <div class="col s12">
                    <div class="input-field col s6">
                        <input id="job_title" type="text" class="validate">
                        <label for="first_name">Search job title</label>
                    </div>
                </div>
                <div class="rcol s12ow">
                    <div class="input-field col s12">
                        <select>
                            <option value="" disabled selected>Select a location</option>
                            <option value="1">Option 1</option>
                            <option value="2">Option 2</option>
                            <option value="3">Option 3</option>
                        </select>
                        <label>Select a state</label>
                    </div>
                </div>
                <div class="col s12">
                    <div class="input-field col s12">
                        <h6>Other form elements gos here...</h6>
                    </div>
                </div>
                <div class="col s12">
                    <div class="input-field col s3">
                        <button class="btn waves-effect waves-light grey" type="submit" name="action">SHOW MATCHING JOBS<i class="material-icons right">send</i></button>
                    </div>
                </div>
            </form>
        </div>        
    </div>

    <div class="container">
        <div class="row result-header"><div class="col s12"></div><h5>Showing all jobs</h5></div>
        <?php
            $i = 1;
            foreach($jobs as $job){
            $uid_text = strtolower($job->job_title);
            $uid = str_replace(' ', '-', $uid_text);
            $uid = $uid.'-'.$i;
        ?>
        <!-- card block -->
        <div class="row" id="<?=$uid?>">
            <div class="col s12">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">
                            <span class="job-title"><?=$job->job_title?></span>
                            <button class="btn btn-small waves-effect waves-light grey" onclick="fbs_click('<?='https://civica-inc.hiringthing.com/'.$job->job_link?>', '<?=$job->job_title?>')" name="action">
                                <i class="fa fa-facebook" aria-hidden="true"></i>
                            </button>
                            <button class="btn btn-small waves-effect waves-light grey" onclick="window.open('http://twitter.com/share?text=<?=$job->job_title?>&url=<?='https://civica-inc.hiringthing.com/'.$job->job_link?>&via=Civika-HiringThing','','scrollbars=no,menubar=no,height=450,width=650,resizable=yes,toolbar=no,location=no,status=no')" name="action">
                                <i class="fa fa-twitter" aria-hidden="true"></i>
                            </button>
                            <button class="btn btn-small waves-effect waves-light grey" onclick="window.open('https://www.linkedin.com/shareArticle?mini=true&url=<?='https://civica-inc.hiringthing.com/'.$job->job_link?>&title=<?=$job->job_title?>&summary=<?=urlencode($job->job_description)?>&source=Civika-HiringThing')" name="action">
                                <i class="fa fa-linkedin" aria-hidden="true"></i>
                            </button>
                        </span>
                        <div class="row">
                        <div class="col s6 mb-2"><span class="job-location"><?php if(isset($job->job_location)){ echo $job->job_location; }?></span></div>
                        <div class="col s6 mb-2"><a href="<?='https://civica-inc.hiringthing.com/'.$job->job_link?>" class="waves-effect waves-light btn-small black-text grey lighten-2 right" target="_blank">Learn More</a></div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <p><?=$job->job_description?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $i++;} ?>
    </div>

    <!-- Load Facebook SDK for JavaScript -->
    <div id="fb-root"></div>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <!-- custome jquery/javascript -->
    <script src="js/script.js"></script>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        function fbs_click(link, title) {
            u=link;
            t=title;
            window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent(u)+'&t='+encodeURIComponent(t),'sharer','toolbar=0,status=0,width=626,height=436');return false;
        }
    </script>
</body>
</html>