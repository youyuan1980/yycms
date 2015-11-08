/**
 * Created by Administrator on 15-5-3.
 */
Ext.onReady(function(){
            var viewport = new Ext.Viewport({
                layout:'border',
                items:[
                    new Ext.BoxComponent({ // raw
                        region:'north',
                        el: 'north',
                        height:32
                    }),{
                        region:'south',
                        contentEl: 'south',
                        split:true,
                        height: 50,
                        minSize: 100,
                        maxSize: 200,
                        collapsible: true,
                        margins:'0 0 0 0'
                    },{
                        region:'west',
                        id:'west-panel',
                        contentEl:'west',
                        title:'导航菜单',
                        split:true,
                        width: 200,
                        minSize: 175,
                        maxSize: 400,
                        collapsible: true
                    },
                    new Ext.TabPanel({
                        region:'center',
                        deferredRender:false,
                        activeTab:0,
                        contentEl:'main',
                        autoScroll:true
                    })
                ]
            });
        });