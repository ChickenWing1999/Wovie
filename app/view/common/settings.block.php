<div class="form-group">
    <label class="custom-label">Menü</label>
    <div class="switch-container">
        <label class="switch"><input name="data[<?php echo $key?>][trends]" type="checkbox" value="1" <?php if(get($Settings,'data.trends',$key)=='1' ) echo 'checked="true"' ;?>><span class="switch-button"></span><?php echo __('Trends');?></label>
        <label class="switch ml-4"><input name="data[<?php echo $key?>][movie]" type="checkbox" value="1" <?php if(get($Settings,'data.movie',$key)=='1' ) echo 'checked="true"' ;?>><span class="switch-button"></span><?php echo __('Movies');?></label>
        <label class="switch ml-4"><input name="data[<?php echo $key?>][serie]" type="checkbox" value="1" <?php if(get($Settings,'data.serie',$key)=='1' ) echo 'checked="true"' ;?>><span class="switch-button"></span><?php echo __('Series');?></label>
        <label class="switch ml-4"><input name="data[<?php echo $key?>][channels]" type="checkbox" value="1" <?php if(get($Settings,'data.channels',$key)=='1' ) echo 'checked="true"' ;?>><span class="switch-button"></span><?php echo __('TV Channels');?></label>
        <label class="switch ml-4"><input name="data[<?php echo $key?>][collections]" type="checkbox" value="1" <?php if(get($Settings,'data.collections',$key)=='1' ) echo 'checked="true"' ;?>><span class="switch-button"></span><?php echo __('Collections');?></label>
        <label class="switch ml-4"><input name="data[<?php echo $key?>][discussions]" type="checkbox" value="1" <?php if(get($Settings,'data.discussions',$key)=='1' ) echo 'checked="true"' ;?>><span class="switch-button"></span><?php echo __('Discussions');?></label>
        <label class="switch ml-4"><input name="data[<?php echo $key?>][actors]" type="checkbox" value="1" <?php if(get($Settings,'data.actors',$key)=='1' ) echo 'checked="true"' ;?>><span class="switch-button"></span><?php echo __('Actors');?></label>
        <label class="switch ml-4"><input name="data[<?php echo $key?>][categories]" type="checkbox" value="1" <?php if(get($Settings,'data.categories',$key)=='1' ) echo 'checked="true"' ;?>><span class="switch-button"></span><?php echo __('Categories');?></label>
    </div>
</div>
<div class="form-group module-accordion">
    <label class="custom-label mt-3"><?php echo __('Home Page Blocks');?></label>
    <?php 
    foreach ($HomeModules as $HomeModule) { 
    $ModuleData       = json_decode($HomeModule['data'], true);
    ?>
    <div class="card card-list module-element">
        <div class="card-header">
            <div class="sortable-move">
                <svg class="icon">
                    <use xlink:href="<?php echo ASSETS.'/img/sprite.svg#sort';?>" />
                </svg>
            </div>
            <a data-toggle="collapse" href="#c<?php echo $HomeModule['id'];?>" role="button" aria-expanded="false" aria-controls="c<?php echo $HomeModule['id'];?>" class="flex-fill">
                <?php echo $HomeModule['name'];?>
                <?php if($HomeModule['status'] == '2') { ?>
                <span class="badge bg-warning-lt ml-2"><?php echo __('Disabled');?></span>
                <?php } ?>
            </a>
        </div>
        <div class="collapse" id="c<?php echo $HomeModule['id'];?>">
            <div class="card-body">
                <input type="hidden" name="module[<?php echo $HomeModule['id'];?>][id]" value="<?php echo $HomeModule['id'];?>">
                <input type="hidden" name="module[<?php echo $HomeModule['id'];?>][page]" value="<?php echo $HomeModule['page'];?>">
                <input type="hidden" name="module[<?php echo $HomeModule['id'];?>][sortable]" value="<?php echo $HomeModule['sortable'];?>" class="sortable-input">
                <div class="form-group">
                    <label class="custom-label"><?php echo __('Title');?></label>
                    <input type="text" name="module[<?php echo $HomeModule['id'];?>][name]" class="form-control form-control-sm" placeholder="Blok Başlık" value="<?php echo $HomeModule['name'];?>">
                </div>
                <div class="form-group">
                    <label class="custom-label"><?php echo __('Sorting');?></label>
                    <select name="module[<?php echo $HomeModule['id'];?>][data][sorting]" class="custom-select custom-select-sm">
                        <option value="id desc" <?php if($ModuleData['sorting']=='id.desc' ) echo 'selected=""' ;?>><?php echo __('Newest');?></option>
                        <option value="hit desc" <?php if($ModuleData['sorting']=='hit.desc' ) echo 'selected=""' ;?>><?php echo __('Popular');?></option>
                    </select>
                </div>
                <?php if($HomeModule['id'] != '7') { ?>
                <div class="form-group">
                    <label class="custom-label">Responsive</label>
                    <select name="module[<?php echo $HomeModule['id'];?>][data][responsive]" class="custom-select custom-select-sm">
                        <option value="horizontal" <?php if($ModuleData['responsive']=='horizontal' ) echo 'selected=""' ;?>><?php echo __('Side Shift');?></option>
                        <option value="vertical" <?php if($ModuleData['responsive']=='vertical' ) echo 'selected=""' ;?>><?php echo __('Lower Bottom');?></option>
                    </select>
                </div>
                <?php } ?>

                <?php if($HomeModule['id'] == '5') { ?>
                <div class="form-group">
                    <label class="custom-label"><?php echo __('Listing');?></label>
                    <select name="module[<?php echo $HomeModule['id'];?>][data][listing]" class="custom-select custom-select-sm">
                        <option value="v1" <?php if($ModuleData['listing']=='v1' ) echo 'selected=""' ;?>><?php echo __('Vertical');?></option>
                        <option value="v2" <?php if($ModuleData['listing']=='v2' ) echo 'selected=""' ;?>><?php echo __('Horizontal');?></option>
                    </select>
                </div>
                <?php } ?>
                <div class="form-group">
                    <label class="custom-label"><?php echo __('Limit');?></label>
                    <input type="text" name="module[<?php echo $HomeModule['id'];?>][data_limit]" class="form-control form-control-sm" placeholder="Limit" value="<?php echo $HomeModule['data_limit'];?>">
                </div>
                <div class="switch-container">
                    <label class="switch"><input name="module[<?php echo $HomeModule['id'];?>][status]" type="checkbox" value="1" <?php if($HomeModule['status']=='1' ) echo 'checked="true"' ;?>><span class="switch-button"></span><?php echo __('Active');?></label>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
</div> 