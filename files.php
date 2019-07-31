<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="icon" href="../../favicon.ico" />
    <title>SD Teeam Staging Server</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet" />
    <link href="css/cover.css" rel="stylesheet" />
    <link href="css/filemanager.css" rel="stylesheet" />
    <!--[if lt IE 9
            ]><script src="../../assets/js/ie8-responsive-file-warning.js"></script
        ><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body>
    <div class="site-wrapper">
        <div class="site-wrapper-inner">
            <div class="cover-container">
                <div class="masthead clearfix">
                    <div class="inner">
                        <nav class="navbar navbar-default">
                            <div class="container-fluid">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                    <a class="navbar-brand font-weight-bold" style="color: #337ab7;" href="#">Concept
                                        Nova Staging Server</a>
                                </div>
                                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                    <ul class="nav navbar-nav">
                                        <li>
                                            <a href="index.php" class="font-weight-bold" style="color: #337ab7;">Switch
                                                to Folder Mode
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/phpmyadmin" class="font-weight-bold"
                                                style="color: #337ab7;">phpMyAdmin</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                        <div style="padding-bottom:10px">
                            <h1>Concept Nova Staging Server</h1>
                        </div>
                    </div>
                </div>
                <div>
                    <?php 
                        class ScanFiles
                        {
                            private $folder;
                            private $files;

                            function __construct($path)
                            {
                                if ($path[ strlen( $path ) - 1 ] ==  '/' ) {
                                    $this->folder = $path;
                                } else {
                                    $this->folder = $path . '/';
                                }
                                    
                                $this->dir = opendir( $path );
                                while (( $file = readdir( $this->dir ) ) != false ) {
                                    $this->files[] = $file;
                                }
                                closedir( $this->dir );
                            }

                            function showFiles()
                            {
                                if (count( $this->files ) > 2) {
                                    natcasesort( $this->files );
                                    $list = '<ul class="filetree" >';
                                    
                                    foreach ( $this->files as $file ) {
                                        if (file_exists( $this->folder . $file ) && $file != '.' && $file != '..' && !is_dir( $this->folder . $file )) {
                                            $ext = preg_replace('/^.*\./', '', $file);
                                            
                                            $arr=array(
                                                "php"  => "php",
                                                "html" => "html"
                                            );
                                            
                                            if (array_key_exists($ext,$arr)) {
                                                $list .= '<li class="file ext_' . $ext . ' text-left"><a href='.htmlentities( $file ) .' target="_blank">' . htmlentities( $file ) . '</a></li>';
                                            }
                                        }
                                    }

                                    $list .= '</ul>';   
                                    
                                    return $list;
                                }
                            }

                        }

                        $path = $_SERVER['DOCUMENT_ROOT'];
                        
                        $tree = new ScanFiles( $path );
                        
                        echo $tree->showFiles();
                        ?>
                </div>

                <div class="mastfoot">
                    <div class="inner">
                        <p>
                            All rights reserved
                            <a href="http://concept-nova.com">Concept Nova <?php echo date('Y'); ?></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>
        window.jQuery ||
            document.write(
                '<script src="js/vendor/jquery.min.js"><\/script>'
            )
    </script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/ie10-viewport-bug-workaround.js"></script>
</body>

</html>