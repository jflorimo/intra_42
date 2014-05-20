<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ldap
{
    private $ldapconn;

    function __construct()
    {
        if ( ! file_exists($file_path = APPPATH.'config/ldap.php'))
        {
            show_error('The configuration file ldap.php does not exist.');
        }
        include($file_path);

        $this->ldapconn = ldap_connect($ldap['uri'])
            or die("Could not connect to LDAP server.<BR />");

        if (!ldap_set_option($this->ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3))
            show_error('Failed to set protocol version to 3<BR />');
        $bind = @ldap_bind($this->ldapconn, 'uid='.$ldap['binduser'].',ou=2013,ou=people,dc=42,dc=fr', $ldap['bindpass']);
        if (!$bind)
            show_error('Failed to bind<BR />');
    }

    function get_user_uid($uid)
    {
        $res = ldap_search($this->ldapconn, 'ou=people,dc=42,dc=fr', 'uid='.$uid);
        $res2 = ldap_get_entries($this->ldapconn, $res);
        return $res2;
    }

    function get_all_user()
    {
        $res = ldap_search($this->ldapconn, 'dc=42,dc=fr', 'uid=*');
        $res2 = ldap_get_entries($this->ldapconn, $res);
        return $res2;
    }

    function is_valid_user($uid, $password)
    {
        $bind = @ldap_bind($this->ldapconn, "uid=".$uid.",ou=2013, ou=people,dc=42, dc=fr", $password);
        return ($bind);
    }

    function get_all_user_byletter($letter)
    {
        $res = ldap_search($this->ldapconn, 'ou=people,dc=42,dc=fr', 'uid='.$letter.'*');
        $res2 = ldap_get_entries($this->ldapconn, $res);
        return $res2;
    }
}