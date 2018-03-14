<?php
class mysqlLoginDAO{	
	public function loginUsuario($array){
		$db=creadorConexion::crear('MySql');
		$dni=$db->limpiaString($array['dni']);
        $pass=$db->limpiaString($array['password']);
		$sql="		SELECT u.idusuario,CONCAT(u.paterno,' ',u.materno,', ',u.nombre) AS usuario
			,c.nombre cargo,mc.cursor,mc.nombre cabecera,mo.nombre opcion,mo.url
			,(SELECT group_concat(ud.iddistrito) FROM usuario_distrito ud WHERE ud.idusuario=u.idusuario) iddistrito
					FROM usuarios u
					INNER JOIN cargos c ON (u.idcargo=c.idcargo AND c.estado=1)
					INNER JOIN menus_cargos m ON (m.idcargo=c.idcargo AND m.estado=1)
					INNER JOIN menus_opciones mo ON (m.idopcion=mo.idopcion AND mo.estado=1)
					INNER JOIN menus_cabeceras mc ON (mc.idmenu=mo.idmenu AND mc.estado=1)					
					WHERE u.dni='$dni'
					AND u.password='$pass'
					ORDER BY idusuario,cabecera,opcion";

		$db->setQuery($sql);
		$usuario=$db->loadObjectList();
		return $usuario;
	}
}
?>