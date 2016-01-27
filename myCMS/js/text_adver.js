var text=[];

text[1]={'title':'sina', 'link':'http://www.sina.com.cn'};
text[2]={'title':'tencent', 'link':'http://www.qq.com'};
text[3]={'title':'baidu', 'link':'http://www.baidu.com'};
text[4]={'title':'taobao', 'link':'http://www.taobao.com'};
text[5]={'title':'360', 'link':'http://www.360.cn'};

var i=Math.floor(Math.random()*5+1);
document.write('<a href="'+text[i].link+'" class="adv" target="_blank">'+text[i].title+'</a>');
