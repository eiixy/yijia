<template>
    <el-container>
        <el-header>
            <div class="logo">Yi<span>+</span> <font>Studio</font></div>
            <el-switch v-model="isCollapse"></el-switch>
        </el-header>
        <el-container>
            <el-aside :width="asideWidth">
                <el-menu :collapse="isCollapse" :router="true" @select="selectHandler">
                    <template v-for="menu in menus">
                        <template v-if="hasSub(menu)">
                            <el-submenu :index="menu.url">
                                <template slot="title">
                                    <i class="el-icon-location"></i>
                                    <span slot="title">{{menu.name}}</span>
                                </template>
                                <template v-for="sub_menu in menu.sub_menu">
                                    <template v-if="hasSub(sub_menu)">
                                        <el-submenu :index="sub_menu.url">
                                            <template slot="title">{{sub_menu.name}}</template>
                                            <template v-for="sub_sub_menu in sub_menu.sub_menu">
                                                <el-menu-item :index="sub_sub_menu.url">{{sub_sub_menu.name}}</el-menu-item>
                                            </template>
                                        </el-submenu>
                                    </template>
                                    <template v-else>
                                        <el-menu-item :index="sub_menu.url">{{sub_menu.name}}</el-menu-item>
                                    </template>
                                </template>
                            </el-submenu>
                        </template>
                        <template v-else>
                            <el-menu-item :index="menu.url">
                                <i class="el-icon-menu"></i>
                                <span slot="title">{{menu.name}}</span>
                            </el-menu-item>
                        </template>
                    </template>
                </el-menu>
            </el-aside>
            <el-main>
                <div :style="{height:'30px'}">
                    <el-breadcrumb separator="/">
                        <el-breadcrumb-item :to="{ path: '/' }">首页</el-breadcrumb-item>
                        <template v-for="item in breadcrumb">
                            <el-breadcrumb-item>{{item}}</el-breadcrumb-item>
                        </template>
                    </el-breadcrumb>
                </div>
                <router-view/>
            </el-main>
        </el-container>
    </el-container>
</template>

<script>
    import axios from "axios"
    export default {
        name: "home",
        data() {
            return {
                menus: null,
                isCollapse: false,
                asideWidth: "200px",
                breadcrumb:['菜单1','菜单1-1'],
            }
        },
        created:function(){
            let menus = this.getMenus();
            console.log(menus);
        },
        watch:{
            isCollapse:function (val) {
                this.asideWidth = val ? "65px" : "200px";
            }
        },
        methods:{
            async getMenus(){
                console.log('get menus....')
                let res =  await axios.get('/api/menus');
                this.menus = res.data;
            },
            hasSub(menu){
                if ('sub_menu' in menu && menu.sub_menu.length >0 ){
                    return true;
                }
                return false;
            },
            selectHandler(index,path){
                var reg = /^\d.*$/;
                var breadcrumb = [];
                for (let item of path) {
                    if (reg.test(item)) {
                        this.menus = item;
                    }
                }

            }
        }
    }

</script>

<style scoped>
    .el-header {
        background-color: #B3C0D1;
        color: #333;
        line-height: 60px;
    }
    .logo{
        width: 120px;
        float: left;
        color: #374c78;
        font-size: 20px;
    }
    .logo span{
        font-size: 24px;
        color: #f56c6c;
    }
    .logo font{
        font-size: 16px;
    }

    .el-aside {
        background-color: #D3DCE6;
        color: #333;
    }

    .el-main {
        background-color: #E9EEF3;
        color: #333;
    }
</style>