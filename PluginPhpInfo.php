<?php
class PluginPhpInfo{
  /**
   * Show php info.
   * Only if user has role webmaster or param key is correct.
   * @param PluginWfArray $data
   */
  public function widget_info($data){
    //ini_set('session.save_path', 'zzz');
    wfPlugin::includeonce('wf/array');
    $data = new PluginWfArray($data);
    if(wfUser::hasRole('webmaster') || ($data->get('data/key') && $data->get('data/key') == wfRequest::get('key'))){
      phpinfo();
    }else{
      wfDocument::renderElement(array(wfDocument::createHtmlElement('p', 'Only user with role webmaster can se this content.')));
    }
  }
}
