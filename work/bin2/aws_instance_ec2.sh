#!/bin/sh

#
# 查找支付中心正在运行的web 实例
#

#/usr/local/bin/aws ec2 describe-instances --filters "Name=instance.group-name,Values=awseb-e-ssma2tagqt-stack-AWSEBSecurityGroup-JC6R9J24CW6C" --query 'Reservations[*].Instances[*].[InstanceId,PublicIpAddress,PrivateIpAddress]'

/usr/local/bin/aws ec2 describe-instances --filters "Name=tag:Name,Values=prod-payment-all-CodeDeploy" --query 'Reservations[*].Instances[*].[InstanceId,PublicIpAddress,PrivateIpAddress]' | $HOME/git/terry/work/bin/aws_instance_ec2_format.php
