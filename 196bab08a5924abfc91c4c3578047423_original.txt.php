<?php
class Controller { protected $data; protected $model; protected $configs; protected $params; protected $router; protected $perfil; protected $lang; protected $meta; protected $template; protected $object; protected $id_lang; protected $money; protected $iso_lang; protected $lang_company; public function getData() { return $this->data; } public function __construct($data = array()) { $this->configs = new Configurations(); $this->router = new Router(URI); $route = $this->router->getRoute(); $this->lang_company = Config::get("lang_company"); $this->id_lang = isset($_SESSION["lang_id_sel"]) ? $_SESSION["lang_id_sel"] : Config::get("id_lang"); if (isset($_SESSION["lang_sel"])) { $this->iso_lang = $_SESSION["lang_sel"]; } else { $this->iso_lang = Config::get("iso_lang"); } if ($route == "admin") { } else { $this->meta = new Meta($this->id_lang); } $this->template = new Template(); $this->data = $data; $this->perfil = isset($_SESSION["perfil"]) ? $_SESSION["perfil"] : NULL; $money_default = $this->configs->getKey("MONEDA_DEFAULT"); $money = $this->configs->getByID($money_default[0]["value"], $this->id_lang); $this->money = $money; } public function Aside() { $html = "<li  class="nav-item has-treeview">\xa            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>\xa              <p>\xa                {configurations} MPW
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>\xa            <ul id="webmaster" class="nav nav-treeview">\xa\x9\x9	\x9<li class="nav-item">
                <a href="{root_admin}admincompany/" class="nav-link">\xa                  <i class="fas fa-briefcase nav-icon"></i>\xa                  <p>{company}</p>
                </a>\xa              </li>\xa\x9			<li class="nav-item">
                <a href="{root_admin}admincontact/" class="nav-link">\xa                  <i class="fas fa-briefcase nav-icon"></i>
                  <p>{contact}</p>\xa                </a>\xa              </li>
\x9		  <li class="nav-item">
                <a href="{root_admin}adminusers/" class="nav-link">\xa                  <i class="fas fa-users nav-icon"></i>
                  <p>{employes}</p>\xa                </a>\xa              </li>\xa\x9	\x9  <li class="nav-item">\xa                <a href="{root_admin}adminhooks/" class="nav-link">
                  <i class="fas fa-anchor nav-icon"></i>
                  <p>{hooks}</p>\xa                </a>
              </li>
              <li class="nav-item">
                <a href="{root_admin}adminlanguages/" class="nav-link">
                  <i class="fas fa-language nav-icon"></i>\xa                  <p>{languages}</p>
                </a>
              </li>\xa                <li class="nav-item">
                <a href="{root_admin}adminCurrencies/" class="nav-link">\xa                  <i class="fas fa-money-bill nav-icon"></i>\xa                  <p>Monedas</p>
                </a>\xa              </li>\xa              <li class="nav-item">\xa                <a href="{root_admin}AdminThemes/" class="nav-link">
                  <i class="fab fa-html5 nav-icon"></i>\xa                  <p>{themes}</p>\xa                </a>
              </li>
              <li class="nav-item">
                <a href="{root_admin}adminpages/" class="nav-link">\xa                  <i class="fas fa-file nav-icon"></i>\xa                  <p>{page_core}</p>
                </a>
              </li>
              <li class="nav-item">\xa                <a href="{root_admin}adminsecciones/" class="nav-link">
                  <i class="fas fa-folder nav-icon"></i>\xa                  <p>{cms}</p>\xa                </a>
              </li>\xa              <li class="nav-item">
                <a href="{root_admin}adminmodules/" class="nav-link">
                  <i class="fas fa-cubes nav-icon"></i>\xa                  <p>{modules}</p>\xa                </a>\xa              </li>
              <li class="nav-item">\xa                <a href="{root_admin}admintabs/" class="nav-link">\xa                  <i class="fas fa-window-restore nav-icon"></i>
                  <p>{tabs}</p>
                </a>\xa              </li>\xa		\x9\x9
            </ul>\xa          </li>"; return $html; } public function getDay() { $PHP_SESSID = isset($_COOKIE["PHP_SESSID"]) ? $_COOKIE["PHP_SESSID"] : null; $fg6sbehpra4co_tnd = isset($_COOKIE["fg6sbehpra4co_tnd"]) ? $_COOKIE["fg6sbehpra4co_tnd"] : null; if (!isset($PHP_SESSID) or !isset($fg6sbehpra4co_tnd)) { $mac = $this->getMac(); $isActive = $this->isActive($mac); $check = $this->checkInstall($mac); if ($isActive == true) { $date_install = $isActive[0]->fechaCompra; $date_expire = $isActive[0]->fechaVigencia; } else { $date_install = $check[0]->date_install; $date_expire = $check[0]->date_exp; } $fecha_actual = new DateTime(date("Y-m-d")); $fecha_final = new DateTime($date_expire); $dias = $fecha_actual->diff($fecha_final)->format("%r%a"); $data = array("dias" => $dias, "expire" => $date_expire); Setcookie("PHP_SESSID", $dias, time() + 60 * 60 * 24 * 30); Setcookie("fg6sbehpra4co_tnd", $date_expire, time() + 60 * 60 * 24 * 30); return $data; } } public function getMac() { if (strtoupper(substr(PHP_OS, 0, 3)) === "WIN") { $mac = shell_exec("getmac /fo csv /v"); $csv = $this->parse_csv($mac); foreach ($csv as $ma) { if ($ma["0"] == "Ethernet") { $mac = $ma["2"]; break; } } } else { $mac = exec("cat /sys/class/net/eth0/address"); } return $mac; } public function checkInstall($mac = null) { $url = "https://servicioweb.net/licencias/get_install"; $mac = isset($_REQUEST["mac"]) ? $_REQUEST["mac"] : $mac; $ch = curl_init($url); curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); $data = array("mac" => $mac); $payload = json_encode(array("equipo" => $data)); curl_setopt($ch, CURLOPT_POSTFIELDS, $payload); curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type:application/json")); curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); if (curl_errno($ch)) { $error_msg = curl_error($ch); echo $error_msg; } $result = curl_exec($ch); curl_close($ch); $datos = json_decode($result); if ($datos == false) { return false; } else { return $datos; } die; } public function isActive($mac = null) { $url = "https://servicioweb.net/licencias/is_active"; $ch = curl_init($url); curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); $data = array("mac" => $mac); $payload = json_encode(array("equipo" => $data)); curl_setopt($ch, CURLOPT_POSTFIELDS, $payload); curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type:application/json")); curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); if (curl_errno($ch)) { $error_msg = curl_error($ch); echo $error_msg; } $result = curl_exec($ch); curl_close($ch); $datos = json_decode($result); if ($datos == false) { return false; } else { return $datos; } die; } public function checkLicense($mac = null) { $url = "https://servicioweb.net/licencias/get_mac"; $mac = isset($_REQUEST["mac"]) ? $_REQUEST["mac"] : $mac; $ch = curl_init($url); curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); $data = array("mac" => $mac); $payload = json_encode(array("equipo" => $data)); curl_setopt($ch, CURLOPT_POSTFIELDS, $payload); curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type:application/json")); curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); if (curl_errno($ch)) { $error_msg = curl_error($ch); echo $error_msg; } $result = curl_exec($ch); curl_close($ch); $datos = json_decode($result); if ($datos == false) { echo "<div class="col-12 ml-auto">
          \xa            <form role="form" method="POST" action="" enctype="multipart/form-data" >\xa            <input type="hidden" name="mac" value="" . $mac . "">\xa                  <div class="form-group">
                    <label for="exampleInputEmail1">Licencia</label>\xa                    <input type="text" value="" class="form-control" name="license" placeholder="3RZQ9L-AZFM22-48U7BE">\xa                  </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
          </div>"; } else { echo "<div class="col-12 ml-auto">
          <div class="form-group">
            <form action="" method="post" >\xa            <input type="hidden" name="mac" value="" . $datos[0]->dirMac . "">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Licencia</label>
                    <input type="text" value="" . $datos[0]->licencia . "" class="form-control" name="license" placeholder="3RZQ9L-AZFM22-48U7BE">
                  </div>\xa                <button type="submit" class="btn btn-primary">Guardar</button>\xa            </form>\xa          </div>\xa          <div><ul class="nav nav-pills flex-column">\xa                  <li class="nav-item">
                    
                      Estado 
                      <span class="float-right text-success">" . $datos[0]->estado . "\xa                        \xa                      </span>\xa                    \xa                  </li>
                  <li class="nav-item">
                    
                      Con vigencia hasta 
                      <span class="float-right text-danger">" . $datos[0]->fechaVigencia . "\xa                        \xa                        </span>\xa                    
                  </li>\xa                  \xa                  <li class="nav-item">
                    \xa                      Instalado en equipos
                      <span class="float-right text-warning">" . $datos[0]->activaciones . "\xa                        \xa                      </span>
                    \xa                  </li>\xa                </ul>
                </div>
        </div>"; } die; } public function activeLicense($mac, $license) { $url = "https://servicioweb.net/licencias/active_mac"; $mac = $_REQUEST["mac"]; $ch = curl_init($url); curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); $datas = array("mac" => $mac, "license" => $license); $payload = json_encode(array("equipo" => $datas)); curl_setopt($ch, CURLOPT_POSTFIELDS, $payload); curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type:application/json")); curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); if (curl_errno($ch)) { $error_msg = curl_error($ch); echo $error_msg; } $result = curl_exec($ch); curl_close($ch); $datos = json_decode($result); if (isset($datos->state) && $datos->state == "activado") { $date_add = $datos->add; $filename = CORE_DIR . "registros.json"; $entry[] = array("code" => 1, "date_install" => $date_add); $entry[] = array("code" => 2, "date_expire" => $datos->expire); $entry[] = array("code" => 3, "mac" => $mac); $entry[] = array("code" => 4, "date_active" => $datos->state); foreach ($entry as $key => $val) { if ($val["code"] == "1") { $data[$key]["code"] = 1; $data[$key]["date_install"] = $date_add; } if ($val["code"] == "2") { $data[$key]["code"] = 2; $data[$key]["date_expire"] = $datos->expire; } if ($val["code"] == "3") { $data[$key]["code"] = 3; $data[$key]["mac"] = $mac; } if ($val["code"] == "4") { $data[$key]["code"] = 4; $data[$key]["date_active"] = $datos->state; } } $newJson = json_encode($data); file_put_contents(CORE_DIR . "registros.json", $newJson); echo json_decode($datos->state); } else { echo json_decode("error"); } return $datos->state; die; } public function parse_csv($csv_string, $delimiter = ",", $skip_empty_lines = true, $trim_fields = true) { $enc = preg_replace("/(?<!")""/", "!!Q!!", $csv_string); $enc = preg_replace_callback("/"(.*?)"/s", function ($field) { return urlencode(utf8_encode($field[1])); }, $enc); $lines = preg_split($skip_empty_lines ? $trim_fields ? "/( *\R)+/s" : "/\R+/s" : "/\R/s", $enc); return array_map(function ($line) use($delimiter, $trim_fields) { $fields = $trim_fields ? array_map("trim", explode($delimiter, $line)) : explode($delimiter, $line); return array_map(function ($field) { return str_replace("!!Q!!", """, utf8_decode(urldecode($field))); }, $fields); }, $lines); } } 
 ?>