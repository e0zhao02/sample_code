var header=[];

header[1]={'title':'sina', 'pic':'images/header1.png', 'link':'http://www.sina.com.cn'};
header[2]={'title':'tencent', 'pic':'images/header2.png', 'link':'http://www.qq.com'};
header[3]={'title':'baidu', 'pic':'images/header3.png', 'link':'http://www.baidu.com'};

var i=Math.floor(Math.random()*3+1);
document.write('<a href="'+header[i].link+'" target="_blank" title="'+header[i].title+'"><img src="'+header[i].pic+'" /></a>');
