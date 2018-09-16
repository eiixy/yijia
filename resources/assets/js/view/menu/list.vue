<template>
    <el-table :data="tableData" style="width: 100%" @filter-change="filterHandler" @sort-change="sortHandler">
        <el-table-column prop="date" column-key="date" label="日期" :sortable="true" :filters="filter.date">
        </el-table-column>
        <el-table-column prop="name" label="姓名" :sortable="true" >
        </el-table-column>
        <el-table-column prop="address" label="地址">
        </el-table-column>
        <el-table-column prop="tag" column-key="tag" label="标签" width="100" :filters="filter.tag" :filter-multiple="false">
            <template slot-scope="scope">
                <el-tag :type="scope.row.tag === '家' ? 'primary' : 'success'" disable-transitions>{{scope.row.tag}}</el-tag>
            </template>
        </el-table-column>
    </el-table>
</template>

<script>
    export default {
        data() {
            return {
                tableData: [
                    {
                        date: '2016-05-02',
                        name: '王小虎',
                        address: '上海市普陀区金沙江路 1518 弄',
                        tag: '家'
                    }, {
                        date: '2016-05-04',
                        name: '王小虎',
                        address: '上海市普陀区金沙江路 1517 弄',
                        tag: '公司'
                    }, {
                        date: '2016-05-01',
                        name: '王小虎',
                        address: '上海市普陀区金沙江路 1519 弄',
                        tag: '家'
                    }, {
                        date: '2016-05-03',
                        name: '王小虎',
                        address: '上海市普陀区金沙江路 1516 弄',
                        tag: '公司'
                    }
                ],
                filter:{
                    date:[
                        {text: '2016-05-01', value: '2016-05-01'},
                        {text: '2016-05-02', value: '2016-05-02'},
                        {text: '2016-05-03', value: '2016-05-03'},
                        {text: '2016-05-04', value: '2016-05-04'}
                    ],
                    tag:[
                        { text: '家', value: '家' },
                        { text: '公司', value: '公司' }
                    ],
                },
                filterValue:{
                    where:{},
                    page:1,
                    limit:10,
                    orderBy:'id,asc'
                },

            }
        },
        methods: {
            filterHandler(_filters) {
                for (let key in _filters) {
                    if (_filters[key] == null || _filters[key].length == 0) {
                        delete this.filterValue.where[key];
                    }else{
                        if (_filters[key].length == 1){
                            this.filterValue.where[key] = _filters[key][0];
                        } else{
                            this.filterValue.where[key] = _filters[key];
                        }
                    }
                }
                console.log(this.filterValue)
            },
            sortHandler(obj){
                if (obj.order == null){
                    this.filterValue.orderBy = null;
                }else{
                    this.filterValue.orderBy = obj.prop+','+obj.order.slice(0,-6);
                }
                console.log(this.filterValue)
            }
        }
    }
</script>