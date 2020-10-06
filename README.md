# ipapi
简单的用php实现的ip地址查询json api

说来讽刺，我第一个自己写的GitHub项目居然是我从来没学过的PHP，虽然是比着别人的PHP代码一点一点查的语法。

## 安装

把整个项目放到服务器上，配置好PHP，然后调用index.php就好了。

地理位置使用的GeoIP2的数据库。

## 使用

因为蒟蒻我不怎么懂PHP，实现不了很复杂的功能。这个项目只支持查询ipv4，而且容错率并不好，不支持Anonymous IP，而且也没有写错误处理。

等一位大佬帮忙改进QAQ

使用的时候直接调用：

http://xxxx?ip=xx.xx.xx.xx

即可，会返回一个json文件。如果不输入ip，会默认使用访问者的ip。

比如令ip=8.8.8.8

如下：

```json
{
    "query":"8.8.8.8",
    "countryCode":"US",
    "country":"United States",
    "countryCN":"美国",
    "continent":"North America",
    "continentCN":"北美洲",
	"regionCode":null,
    "region":null,
    "regionCN":null,
    "city":null,
    "cityCN":null,
    "postCode":null,
    "latitude":37.751,
    "longitude":-97.822
}
```

