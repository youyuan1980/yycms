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
                        height:65
                    }),{
                        region:'south',
                        contentEl: 'south',
                        split:true,
                        height: 40,
                        minSize: 100,
                        maxSize: 200,
                        collapsible: true,
                        border:false,
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
                        collapsible: true,
                        autoScroll:true,
                        margins:'0 0 0 5',
                        layout:'accordion',
                        layoutConfig:{
                            animate:true
                        }
                    },
                    new Ext.Panel({
                        region:'center',
                        contentEl:'main',
                        id:'center'
                    })
                ]
            });
        });

// Ext.onReady(function () {
//     Ext.state.Manager.setProvider(new Ext.state.CookieProvider());
//     var viewport = new Ext.Viewport({
//         layout: 'border',
//         items: [
//                 new Ext.BoxComponent({ // raw
//                     region: 'north',
//                     el: 'north',
//                     height: 65
//                 }),
//                   new Ext.Panel({
//                       region: 'south',
//                       contentEl: 'south',
//                       split: true,
//                       height: 40,
//                       minSize: 100,
//                       maxSize: 200,
//                       collapsible: true,
//                       border:false,
//                       margins: '0 0 0 0'
//                   }),
//                  {
//                      region: 'west',
//                      id: 'west-panel',
//                      title: '功能菜单',
//                      autoScroll: true,
//                      split: true,
//                      width: 200,
//                      minSize: 175,
//                      maxSize: 400,
//                      collapsible: true,
//                      margins: '0 0 0 5',
//                      layout: 'accordion',
//                      layoutConfig: {
//                          animate: true
//                      },
//                      contentEl: 'west'
//                  },
//                 new Ext.Panel({
//                     region: 'center',
//                     id: 'center',
//                     contentEl: 'main'
//                 })
//              ]
//     });
// });