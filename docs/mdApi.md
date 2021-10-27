
## 这个API文档很有意思

### 请求参数

```json
{
  "name": "张三",
  "sex": "男",
  "age": 18 
}
```

### 响应结果

根据name参数返回不同类型与内容，参考下表

|name字段值|类型|返回内容|
|-|-|-|
|1|string|姓名|
|2|number|年龄|
|3|object|`{ name:"abc",age:18 }`|


