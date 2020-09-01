function outDoc(tex){
  var table=document.all.brand;
  row=table.rows.length;
  column=table.rows(1).cells.length;
  var wdapp=new ActiveXObject("Word.Application");
  wdapp.visible=true;
  wddoc=wdapp.Documents.Add();  //添加新的文档
  thearray=new Array();
//将页面中表格的内容存放在数组中
for(i=0;i<row;i++){
	thearray[i]=new Array();
	for(j=0;j<column;j++){
          thearray[i][j]=table.rows(i).cells(j).innerHTML;
	}
}
var range = wddoc.Range(0,0);
range.Text=tex+"\n";
wdapp.Application.Activedocument.Paragraphs.Add(range);
wdapp.Application.Activedocument.Paragraphs.Add();
rngcurrent=wdapp.Application.Activedocument.Paragraphs(3).Range;

var objTable=wddoc.Tables.Add(rngcurrent,row,column)     //插入表格
for(i=0;i<row;i++){
	for(j=0;j<column;j++){
	objTable.Cell(i+1,j+1).Range.Text = thearray[i][j].replace("&nbsp;","");
	}
}
wdapp.Application.ActiveDocument.SaveAs("orderInfo.doc",0,false,"",true,"",false,false,false,false,false);
wdapp.Application.Printout();
wdapp=null;
}