<?php

namespace Spine\lib\Assets;

use Spine\lib\Assets\ManifestInterface;

class JsonManifest implements ManifestInterface {
  protected $manifest = [];

  /**
  * JsonManifest constructor
  */
  public function __construct($manifestPath) {
    $this->manifest = file_exists($manifestPath) ? json_decode(file_get_contents($manifestPath), true) : [];
  }

  public function get($file) {
    return isset($this->manifest[$file]) ? $this->manifest[$file] : $file;
  }

  public function getAll(){
    return $this->manifest;
  }
}
