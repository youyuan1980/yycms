var gDataKeyElementID="SelectedDataKeyValue";
var gSelectAllCheckBoxName="";
var gDataEditTool;

function DataEditTool(SelectAllCheckBoxName,CheckBoxItemName,SelectedGridRowStyle,SaveDataKeyValueName)
{
      gSelectAllCheckBoxName=SelectAllCheckBoxName;
      this.CheckBoxName=CheckBoxItemName;
      this.SelectedGridRowStyle=SelectedGridRowStyle;
      gDataKeyElementID=SaveDataKeyValueName;
      this.SelectedGridRowObject=null;
      this.Data=null;
      this.onClick = null;
      this.Click = function()
      {
        if (this.onClick)
        {
           this.onClick(this);
         }
      }
      this.IsSelectedByCheckBox=false;
      this.EventBubble = false;

      if (document.all)
      { attachEvent('onload', this.Init); }
      else
      { addEventListener("load", this.Init, false); }
      gDataEditTool=this;
}

DataEditTool.prototype.Init = function()
{
 var e1 = document.createElement('input'); 
 e1.type='hidden';
 e1.name=gDataKeyElementID;
 e1.id=gDataKeyElementID;
 document.forms[0].appendChild(e1);
 
 var SelectAllCheckBoxObj=GetElementObject(gSelectAllCheckBoxName);
 if(SelectAllCheckBoxObj)
 {
  SelectAllCheckBoxObj.attachEvent("onclick",SelectAllCheckBox); 
 }
 
 var obj=document.getElementsByTagName("input")
 if(obj.length)
 {
		   for(var i=0;i<obj.length;i++)
		   {
		     if(obj[i].type=="checkbox"&&obj[i].name.indexOf(gDataEditTool.CheckBoxName)>=0)
		     {
		       obj[i].attachEvent("onclick",CheckBoxItemClick); 
			 }
		   }
 }
}

DataEditTool.prototype.GridRowClick = function(GridRowObject,GridDataKeyValue,GridDataObject)
{
        try
        {
         this.Data=GridDataObject;
         var DataKeyValueElement=document.getElementById(gDataKeyElementID);
         DataKeyValueElement.value="";
         if(this.SelectedGridRowObject)
         {
           this.SelectedGridRowObject.className='';
           if(this.CheckBoxName!=""&&!this.EventBubble&&!this.IsSelectedByCheckBox)
           {
             if(this.SelectedGridRowObject!=GridRowObject)
             {
               var chboxSelected=this.GetCheckBoxByID(this.SelectedGridRowObject,this.CheckBoxName);
               if(chboxSelected&&chboxSelected.checked){chboxSelected.checked=false;}
             }
           }
         }
         if(this.CheckBoxName!="")
         {
          var chbox=this.GetCheckBoxByID(GridRowObject,this.CheckBoxName);
          if(chbox==null){return false;}
          if(!this.EventBubble){chbox.checked=true;}
         }
         if(this.CheckBoxName==""||chbox.checked)
         {
           this.SelectedGridRowObject=GridRowObject;
           DataKeyValueElement.value=GridDataKeyValue;
           GridRowObject.className=this.SelectedGridRowStyle; 
         }
         this.Click();
        }
        finally
        {
         this.IsSelectedByCheckBox=this.EventBubble;
         this.EventBubble=false;
        }
}

DataEditTool.prototype.GetDataKeyValue = function()
{
  var DataKeyValueElement=document.getElementById(gDataKeyElementID);
  return DataKeyValueElement.value;
}

DataEditTool.prototype.GetCheckBoxByID = function(Container,CheckBoxName)   
{
      var obj=Container.getElementsByTagName("input")
      try{
	    if(obj.length)
	    {
		   for(var i=0;i<obj.length;i++)
		   {
		     if(obj[i].type=="checkbox"&&obj[i].name.indexOf(CheckBoxName)>=0)
		     {
			    return obj[i];
			 }
		   }
	    }
	   return null;
	  }
	 catch(exception){return null;}
} 

DataEditTool.prototype.DisableLink=function(id)
{
   var obj=document.getElementById(id);
   if(obj)
   {
     obj.setAttribute("enabled","false");
     obj.style.color='gray';
     obj.style.cursor='default';
   }
}

DataEditTool.prototype.EnableLink=function(id)
{
   var obj=document.getElementById(id);
   if(obj)
   {
     obj.setAttribute("enabled","true");
     obj.style.color='';
     obj.style.cursor='pointer';
   }
}

DataEditTool.prototype.IsEnable=function(obj)
{
   if(obj)
   {
     var enable=obj.getAttribute("enabled");
     if(!enable)
     {
       return true;
     }
     else
     {
       return enable=="true";
     }
   }
   return true;
}

function GetElementObject(ObjectID)
{
  return document.getElementById(ObjectID);
}   

function CheckBoxItemClick()
{     
  gDataEditTool.EventBubble=true;    
}

function SelectAllCheckBox()   
{
      var obj=document.getElementsByTagName("input")
      try{
	    if(obj.length)
	    {
		   for(var i=0;i<obj.length;i++)
		   {
		     if(obj[i].type=="checkbox"&&obj[i].name.indexOf(gDataEditTool.CheckBoxName)>=0)
		     {
			   obj[i].checked=event.srcElement.checked;
			 }
		   }
	    }
	  }
	 catch(exception){return false;}
}