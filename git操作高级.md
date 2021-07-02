git diff 查看文件修改后的差异
 git diff用于显示WorkSpace中的文件和暂存区文件的差异，如果要看改动了什么，可以用：

复制代码
#比较工作空间中的文件和暂存区文件的差异
git diff [files]

#比较暂存区的文件与之前已经提交过的文件差异
git diff --cached [files]

#比较repo与工作空间中的文件差异
git diff HEAD [files]
复制代码


### git 搜索技巧
https://www.cnblogs.com/liangqihui/p/12932351.html