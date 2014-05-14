###################################################
# Disqus
###################################################

[PIDupinRootline = 82] || [globalVar = TSFE:id = 1]
	lib.disqus.display = 1
[else]
	lib.disqus.display = 0
[end]