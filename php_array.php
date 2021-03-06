php数组函数大全
	
	1.array() 		                创建数组
	2.array_change_key_case()		把数组中所有键改为小写或大写
	3.array_chunk()		            把数组分割为新的数组块
	4.array_column() 	            返回输入数组中某个单一列的值
	5.array_combine() 	            通过合并两个数组来创建一个新数组
	6.array_count_values()	        统计数组中所有值出现的次数
	7.array_diff() 		            比较数组，返回差集(只比较键值)
	8.array_diff_assoc()	        比较数组，返回差集(比较键名和键值)
	9.array_diff_key()		        比较数组，返回差集(只比较键名)
	10.array_diff_uassoc()	        比较数组，返回差集(比较键名和键值，使用用户定义的键名比较函数)
	11.array_diff_ukey()			比较数组，返回差集(只比较键名，使用用户自定义的键名比较函数)
	12.array_fill()					用给定的键值填充数组
	13.array_fill_keys()			用指定键名的给定键值填充数组
	14.array_filter()				用回调函数过滤数组中的元素
	15.array_flip()					交换数组中的键和值
	16.array_intersect()			比较数组，返回交集(只比较键值)
	17.array_intersect_key()		比较数组，返回交集(比较键名)
	18.array_intersect_assoc()		比较数组，返回交集(比较键名和键值)
	19.array_intersect_uassoc()		比较数组，返回交集(比较键名和键值，使用用户自定义的键名比较函数)
	20.array_intersect_ukey()		比较数组，返回交集(只比较键名，使用用户自定义的键名比较函数)
	21.array_key_exists()			检查指定的键名是否存在于数组中
	22.array_keys()					返回数组中所有的键名
	23.array_map()					把数组中的每个值发送到用户自定义函数，返回新的值
	24.array_merge()				把一个或多个数组合并为一个数组
	25.array_merge_recursive()		递归地合并一个或多个数组
	26.array_multisort()			对多个数组或多维数组进行排序
	27.array_pad()					用值将数组填补到指定长度
	28.array_pop()					删除数组的最后一个元素(出栈)
	29.array_product()				计算数组中左右值的乘积
	30.array_push()					将一个或多个元素插入数组的末尾(入栈)
	31.array_rand()					返回数组中一个或多个随机的键
	32.array_reduce()				通过使用用户自定义函数，以字符串返回数组
	33.array_replace()				使用后面数组的值替换地一个数组的值
	34.array_replace_recursive()	递归地使用后面数组的值替换地一个数组的值
	35.array_reverse()				以相反的顺序返回数组
	36.array_search()				搜索数组中给定的值并返回键名
	37.array_shift()				删除数组中首个元素，并返回被删除元素的值
	38.array_slice()				返回数组中被选定的部分
	39.array_splice()				删除并替换数组中指定的元素
	40.array_sum					返回数组中值的和
	41.array_udiff					比较数组，返回差集(只比较值，使用一个用户自定义的键名比较函数)
	42.array_udiff_assoc()			比较数组，返回差集(比较键和值，使用内建函数比较键名，使用用户自定义函数比较键值)
	43.array_udiff_uassoc()			比较数组，返回差集(比较键和值，使用一个用户自定义的键名比较函数)
	44.array_uintersect()			比较数组，返回交集(只比较值，使用一个用户自定义的键名比较函数)
	45.array_uintersect_assoc()		比较数组，返回交集(比较键和值，使用内建函数比较键名，使用用户自定义函数比较键值)
	46.array_unique()				删除数组中的重复值
	47.array_unshift()				在数组开头插入一个或多个元素
	48.array_values()				返回数组中所有的值
	49.array_walk()					对数组中的每个成员应用用户函数
	50.array_walk_recursive()		对数组中的每个成员递归的应用用户函数
	51.arsort()						对关联数组按照键值进行降序排序
	52.asort()						对关联数组按照键值进行升序排序
	53.compact()					创建包含变量名和它们的值的数组
	54.count()						返回数组中元素的数目
	55.current()					返回数组中的当前元素
	56.each()						返回数组中当前的键/值对
	57.end()						将数组的内部指针指向最后一个元素
	58.extract()					从数组中将变量导入到当前的符号表
	59.in_array()					检查数组中是否存在指定的值
	60.key()						从关联数组中取得键名
	61.krsort()						对数组按照键名排序
	62.list()						把数组中的值赋给一些变量
	63.natcasesort()				用"自然排序"算法对数组进行不区分大小写字母排序
	64.natsort()					用"自然排序"算法对数组排序
	65.next()						将数组中的内部指针向前移动一位
	66.pos()						current()的别名
	67.prev()						将数组的内部指针倒回一位
	68.range()						创建包含指定返回单元的数组
	69.reset()						将数组的内部指针指向第一个元素
	70.rsort()						对数组逆向排序
	71.shuffle()					将数组打乱
	72.sizeof()						count()别名
	73.sort()						对数组排序
	74.uasort()						使用用户自定义的比较函数对数组中的键值进行排序
	75.uksort()						使用用户自定义的比较函数对数组中的键名进行排序
	76.usort()						使用用户自定义的比较函数对数组进行排序