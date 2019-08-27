

<?php  function apagarTudo ($dir) {
  
          if (is_dir($dir)) {

              $iterator = new \FilesystemIterator($dir);

              if ($iterator->valid()) {

                  $di = new RecursiveDirectoryIterator($dir, FilesystemIterator::SKIP_DOTS);
                  $ri = new RecursiveIteratorIterator($di, RecursiveIteratorIterator::CHILD_FIRST);

                  foreach ( $ri as $file ) {

                      $file->isDir() ?  rmdir($file) : unlink($file);
                  }
              }
          }
      }  
      $nome_banner = $_GET['banner'];
      $caminho = '../documentos/' . $nome_banner . '/'; 
      apagarTudo($caminho);
      ?>